<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Cartalyst\Sentinel\Laravel\Facades\Reminder;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;

class AccountController extends Controller
{
	public function getQuenmatkhau(){
    	return view('page.quenmatkhau');
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
