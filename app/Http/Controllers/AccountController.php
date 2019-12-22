<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Cartalyst\Sentinel\Laravel\Facades\Reminder;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Khachhang;

class AccountController extends Controller
{

    public function getDangnhap(){
        return view('page.dangnhap');
    }

    public function getDangki(){
        return view('page.dangki');
    }

	public function getQuenmatkhau(){
    	return view('page.quenmatkhau');
	}

    public function postDangnhap(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:20'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Email không đúng định dạng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự',
                'password.max'=>'Mật khẩu không quá 20 kí tự'
            ]
        );
        $maquyen =  User::where('email', $req->email)->first();
        if($maquyen->maquyen != 2) 
            return redirect()->back()->with(['loiLogin'=>'Bạn phải đăng nhập bằng tài khoản khách hàng']);
        $dangnhap = array('email'=>$req->email,'password'=>$req->password);
        if(Auth::attempt($dangnhap)){
            DB::table('users')->where('email', $req->email)
                                ->update(['ttdn' => 1]);
            if(Session::has('cart')){
                $khachhang = Khachhang::where('email', Auth::user()->email)->first();
                return view('page.dathang', compact('khachhang'));
            }
            redirect()->back()->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
            return redirect()->route('trang-chu');
        }
        else{
            return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
        }
    }
    public function getDangxuat(){
        $email = Auth::user()->email;
        DB::table('users')->where('email', $email)
                                ->update(['ttdn' => 0]);
        Auth::logout();
        return redirect()->route('trang-chu');
    }

    public function postDangki(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:20',
                'tentk'=>'required',
                're_password'=>'required|same:password'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email',
                'email.unique'=>'Email đã có người sử dụng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                're_password.same'=>'Mật khẩu không giống nhau',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự'
            ]);
        $user = new User();
        $khachhang = new Khachhang();
        $user->tentk = $req->tentk;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->maquyen = 2;

        if($req->hinhanh == null)
            $user->hinhanh = 'default.jpeg';
        else
            $user->hinhanh = $req->hinhanh;
        $user->save();
        $khachhang->hoten = $req->hoten;
        $khachhang->gioitinh = $req->gioitinh;
        $khachhang->diachi = $req->diachi;
        $khachhang->email = $req->email;
        $khachhang->diachi = $req->diachi;
        $khachhang->sodt = $req->sodt;
        $khachhang->matk = $user->id;
        $khachhang->save();
        return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');
    }

    public function getDoimatkhau(){
        return view('page.doimatkhau');
    }

    public function postDoimatkhau(Request $req){
        if(Auth::check()){
            if($req->password != $req->re_password)
                return redirect()->back()->with(['loi'=>'Xác nhận mật khẩu không giống nhau']);
            if(Hash::check($req->old_password, Auth::user()->password) == false){
                return redirect()->back()->with(['loi'=>'Mật khẩu cũ không chính xác']);
            }
            else{
                $password = Hash::make($req->password);

                DB::table('users')
                    ->where('email', Auth::user()->email)
                    ->update(['password' => $password]);
                    
                return redirect()->back()->with(['thanhcong'=>'Đổi mật khẩu thành công']);
            }
        }
        else return redirect()->back()->with(['loi'=>'Bạn chưa đăng nhập không thể thực hiện chức năng này']);
    }

	public function getKhoiphuc($email, $code){ 
		return view('page.khoiphuc', compact('email', 'code'));
    }

    public function postKhoiphuc(Request $req){
		$this->validate($req,
            [
                'password'=>'required|min:6|max:20',
                're_password'=>'required|same:password'
            ],
            [
                'password.required'=>'Vui lòng nhập mật khẩu',
                're_password.same'=>'Mật khẩu không giống nhau',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự'
			]);
			
		$password = Hash::make($req->password);

		DB::table('users')
            ->where('email', $req->email)
			->update(['password' => $password]);

		DB::table('reminders')->where('code', '=', $req->code)->delete();
		
		return redirect()->route('dang-nhap')->with(['thanhcong' => 'Khôi phục tài khoản thành công']);
	}

    public function postQuenmatkhau(Request $req){
    	$user = User::whereEmail($req->email)->first();
    	
    	if(!$user){
    		return redirect()->back()->with(['loi' => 'Email không tồn tại trong hệ thống']);
    	}
    	$user = Sentinel::findById($user->id);
    	$reminder = Reminder::exists($user) ?  : Reminder::create($user);
    	$this->sendEmail($user, $reminder->code);

    	return redirect()->back()->with(['thanhcong' => 'Code phục hồi đã gửi đến email của bạn']);
    }

    public function sendEmail($user, $code){
    	Mail::send(
    		'page.forgot',
    		['user'=>$user, 'code'=>$code],
    		function($message) use  ($user){
    			$message->to($user->email);
    			$message->subject("$user->email, Mã khôi phục của bạn.");
    		}		
    	);
    }
}
