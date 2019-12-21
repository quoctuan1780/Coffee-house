<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Sanpham;
use App\Loaisanpham;
use App\Khachhang;
use App\Donhang;
use App\Ctdh;
use App\Tintuc;
use App\Cart;
use App\User;
use App\Phanhoi;
use App\Dknt;
use App\Gioithieu;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex(){
    	$slide = Slide::all();
        $new_product = Sanpham::where('moi',1)->paginate(4);
        $sanpham_khuyenmai = Sanpham::where('giakm', '<>', 0)->paginate(8);
        return view('page.trangchu',compact('slide', 'new_product', 'sanpham_khuyenmai'));
    }

    //Nhóm controller về sản phẩm
    public function getLoaiSp($loai){
        $sp_theoloai = Sanpham::where('maloaisp', $loai)->get();
        $sp_khac = Sanpham::where('maloaisp', '<>', $loai)->paginate(3);
        $loaisp = Loaisanpham::all();
        $tenloaisp = Loaisanpham::where('maloaisp', $loai)->first();
    	return view('page.loaisanpham',  compact('sp_theoloai', 'sp_khac', 'loaisp', 'tenloaisp'));
    }

    public function getChiTietSp(Request $req){
        $sp_banchay = [];
        $sanpham = Sanpham::where('masp', $req->masp)->first();
        $sp_tuongtu = Sanpham::where('maloaisp', $sanpham->maloaisp)->paginate(3);
        $sp_moi = Sanpham::where('moi', '=', 1)->paginate(2);   
        $sp_mua = DB::table('ctdh')
                                ->select('ctdh.masp', DB::raw('SUM(soluong) as tongSl'), 'sanpham.tensp', 'sanpham.gia', 'sanpham.giakm', 'sanpham.hinhanh')
                                ->join('sanpham', 'ctdh.masp', '=' ,'sanpham.masp')
                                ->groupBy('ctdh.masp', 'sanpham.tensp', 'sanpham.gia', 'sanpham.giakm', 'sanpham.hinhanh')
                                ->orderBy('tongsl', 'desc')
                                ->get();
        if(count($sp_mua) >= 4)
        for($i = 0; $i < 4; $i++){
            $sp_banchay[$i] = $sp_mua[$i];
        }
        else
        for($i = 0; $i < count($sp_mua); $i++){
            $sp_banchay[$i] = $sp_mua[$i];
        } 
    	return view('page.chitietsanpham', compact('sanpham', 'sp_tuongtu', 'sp_moi', 'sp_banchay'));
    }

    //Nhóm controller về liên hệ giới thiệu
    public function getLienHe(){
    	return view('page.lienhe');
    }

    public function postLienhe(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Email không đúng định dạng'
            ]
        );
        $phanhoi = new Phanhoi();
        $phanhoi->email = $req->email;
        $phanhoi->hoten = $req->name;
        $phanhoi->vande = $req->subject;
        $phanhoi->noidung = $req->message;
        $phanhoi->ngayph = Date('Y-m-d');
        $phanhoi->save();
        return redirect()->back()->with(['thanhcong'=>'Chúng tôi đã ghi nhận phản hồi của bạn, xin cảm ơn']);
    }

    public function getGioiThieu(){
        $gioithieu = Gioithieu::all();
    	return view('page.gioithieu', compact('gioithieu'));
    }

    // Nhóm controller về giỏ hàng

    public function getThemgiohang(Request $req, $masp){
        $product = Sanpham::where('masp', $masp)->first();
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $masp);
        $req->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function getThemnhieugiohang(Request $req, $masp){
        $product = Sanpham::where('masp', $masp)->first();
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->addMulti($product, $masp, $req->soluong);
        $req->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function getXoagiohang($masp){
        $oldcart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldcart);
        $cart->removeItem($masp);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart); 
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }

    //Nhóm controller về tài khoản

    

    //Nhóm controller về đặt hàng

    public function getCheckout(){
        return view('page.checkout');
    }

    public function getDathang(){
        if(Auth::check()){
            if(Session::has('cart')){
                $khachhang = Khachhang::where('email', Auth::user()->email)->first();
                return view('page.dathang', compact('khachhang'));
            }
            else{
                $khachhang = Khachhang::where('email', Auth::user()->email)->first();
                return view('page.dathang', compact('khachhang'));
            }
        }
        else{
            $khachhang = Khachhang::all();
            return view('page.dathang', compact('khachhang'));
        }
    }

    public function postDathang(Request $req){
        $cart = Session::get('cart');
        $donhang = new Donhang;
        if(Auth::check())
        {
            $khachhang = Khachhang::where('email', Auth::user()->email)->first();
            $donhang->makh = $khachhang->makh;
            $donhang->ngaydat = date('Y-m-d');
            $donhang->tongtien = $cart->totalPrice;
            $donhang->httt = $req->payment_method;
            $donhang->ghichu = $req->ghichu;
            $donhang->save();
            foreach($cart->items as $key=>$value){
                $ctdh = new Ctdh;
                $ctdh->madh  = $donhang->id;
                $ctdh->masp = $key;
                $ctdh->soluong = $value['qty'];
                $ctdh->gia = ($value['price']);
                $ctdh->save();   
            }
        }
        else{
            $kh = Khachhang::where('email', $req->emailAjax)->first();
            if($kh){
                $donhang->makh = $kh->makh;
                $donhang->ngaydat = date('Y-m-d');
                $donhang->tongtien = $cart->totalPrice;
                $donhang->httt = $req->payment_method;
                $donhang->ghichu = $req->ghichuAjax;
                $donhang->save();
                
                foreach($cart->items as $key=>$value){
                    $ctdh = new Ctdh;
                    $ctdh->madh  = $donhang->id;
                    $ctdh->masp = $key;
                    $ctdh->soluong = $value['qty'];
                    $ctdh->gia = ($value['price']);
                    $ctdh->save();   
                }
            }
            else{
                $khachhang = new Khachhang;
                $khachhang->hoten = $req->hotenAjax;
                $khachhang->gioitinh = $req->gioitinhAjax;
                $khachhang->email = $req->emailAjax; 
                $khachhang->diachi = $req->diachiAjax;
                $khachhang->sodt = $req->sodtAjax;
                $khachhang->save();

                $donhang->makh = $khachhang->id;
                $donhang->ngaydat = date('Y-m-d');
                $donhang->tongtien = $cart->totalPrice;
                $donhang->httt = $req->payment_method;
                $donhang->ghichu = $req->ghichuAjax;
                $donhang->save();
                foreach($cart->items as $key=>$value){
                    $ctdh = new Ctdh;
                    $ctdh->madh  = $donhang->id;
                    $ctdh->masp = $key;
                    $ctdh->soluong = $value['qty'];
                    $ctdh->gia = ($value['price']);
                    $ctdh->save();  
                }
            }
        }
        Session::forget('cart');
        return redirect()->route('dat-hang')->with('thongbao', 'Đặt hàng thành công');
    }

    //controllre về tìm kiếm
    public function getTimkiem(Request $req){
        $product = Sanpham::where('tensp', 'like', '%'.$req->s.'%')
                            ->orWhere('gia', $req->s)->get();
        return view('page.timkiem', compact('product'));
    }

    public function postDangkinhantin(Request $req){
        $checkMail = Dknt::where('email', $req->email)->first();
        if(is_null($checkMail)){
            $dknt = new Dknt();
            $dknt->email = $req->email;
            $dknt->ngaydk = date('Y-m-d');
            $dknt->save();
            return redirect()->back()->with(['ntthanhcong'=>'Đăng kí nhận tin thành công']);
        }
        else return redirect()->back()->with(['ntloi'=>'Email này đã đăng kí nhận tin rồi']);
    }

    //Nhóm controller khách hàng
    public function getThongtinkhachhang($id){
        if(Auth::check()){
            $khachhang = Khachhang::where('matk', $id)->first();
            return view('page.thongtinkhachhang', compact('khachhang'));
        }
        else return redirect('dangnhap');
    }

    public function postThongtinkhachhang(Request $req){
        DB::table('khachhang')->where('makh', $req->makh)->update(['hoten'=>$req->hoten, 'diachi'=>$req->diachi, 'sodt'=>$req->sodt, 'gioitinh'=>$req->gioitinh]);
        return redirect()->back()->with(['thanhcong'=>'Cập nhật thông tin thành công']);
    }

    public function postThongtintaikhoan(Request $req){
        if($req->hinhanh == null) $hinhanh = 'default.jpeg';
        else $hinhanh = $req->hinhanh;
        DB::table('users')->where('id', Auth::user()->id)->update(['tentk'=>$req->tentk, 'hinhanh'=>$hinhanh]);
        return redirect()->back()->with(['thanhcongTk'=>'Cập nhật thông tin tài khoản thành công']);
    }
}
