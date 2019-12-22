<?php

namespace App\Http\Controllers;
use App\Khachhang;
use App\Sanpham;
use App\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
  	public function getDonhang($email){
  		$khachhang = Khachhang::where('email', $email)->first();
  		if (is_null($khachhang->matk)){
	  		echo "<div class='form-block'><label for='name'>Họ tên*</label><input type='text' id='nameAjax' name='hoten' placeholder='Họ tên' value='".$khachhang->hoten."' required></div>";

	  		if($khachhang->gioitinh == 'Nam')
	  			echo "<div class='form-block'><label>Giới tính </label><input id='genderAjax' type='radio' class='input-radio' name='gioitinh' value='nam' checked='checked' style='width: 10%'><span style='margin-right: 10%'>Nam</span>
					<input id='genderAjax' type='radio' class='input-radio' name='gioitinh' value='nữ' style='width: 10%'><span>Nữ</span></div>";
	  		else 
	  			echo "<div class='form-block'><label>Giới tính </label><input id='genderAjax' type='radio' class='input-radio' name='gioitinh' value='nam'  style='width: 10%'><span style='margin-right: 10%'>Nam</span><input id='genderAjax' type='radio' class='input-radio' name='gioitinh' value='nữ' checked='checked' style='width: 10%'><span>Nữ</span></div>";
	  		echo "<div class='form-block'><label for='adress' style='padding-top: 10px'>Địa chỉ*</label><input type='text' id='addressAjax' name='diachi' placeholder='Street Address' value='".$khachhang->diachi."' required></div>";

	  		echo "<div class='form-block'><label for='adress' style='padding-top: 10px'>Địa chỉ*</label><input type='text' id='addressAjax' name='diachi' placeholder='Street Address' value='".$khachhang->sodt."' required></div>";
  		}
  	} 
    public function getTimkiem(Request $request){
      if($request->get('query'))
        {
            $query = $request->get('query');
            $sanpham = Sanpham::where('tensp', 'LIKE', "%{$query}%")->get();
            $output = '<div class="beta-products-details"><p class="pull-left">Tìm thấy '.count($sanpham).' sản phẩm</p><div class="clearfix"></div></div>';
            $output .= '<div class="row">';
            foreach($sanpham as $sp){
                $output .= '<div class="col-sm-3" style="height: 400px;"><div class="single-item">';
                if($sp->giakm != 0) $output .= '<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>';
                $output .= '<div class="single-item-header"><a href="../chitietsanpham/'.$sp->masp.'""><img style="box-shadow: 0px 0px 3px 0px rgba(88, 88, 88, 0.3);" src="image/product/'.$sp->hinhanh.'" alt="" height="250px"></a></div><div class="single-item-body"><p class="single-item-title">'.$sp->tensp.'</p><p class="single-item-price">';
                if ($sp->giakm == 0) $output .= '<span class="flash-sale">'.number_format($sp->gia).' VND</span>';
                else $output .= '<span class="flash-del">'.number_format($sp->gia).' VND</span><span class="flash-sale">'.number_format($sp->giakm).' VND</span>';
                $output .= '</p></div><div class="single-item-caption"><a class="add-to-cart pull-left" href="../themgiohang/'.$sp->masp.'"><i class="fa fa-shopping-cart"></i></a><a class="beta-btn primary" href="../chitietsanpham/'.$sp->masp.'">Chi tiết<i class="fa fa-chevron-right"></i></a><div class="clearfix"></div></div></div></div>';
            }

          $output .= '</div></div>';  
          echo $output;
       }
    }

    public function getUpdatecart(Request $req){
      $oldCart = Session('cart')?Session::get('cart'):null;
      $cart = new Cart($oldCart);
      $cart->updateQty($req->id, $req->soluong);
      Session::put('cart', $cart);
      $cartUpdate = Session::get('cart');
      echo $cartUpdate->totalPrice;
    }

    public function getDeletecart(Request $req){
      $oldcart = Session::has('cart')?Session::get('cart'):null;
      $cart = new Cart($oldcart);
      $cart->removeItem($req->masp);
      if (count($cart->items) > 0) {
          Session::put('cart', $cart);
          $total = Session::get('cart')->totalPrice; 
          echo $total;
      }
      else{
          Session::forget('cart');
          echo 'forget';
      } 
    }

    public function getAddcart(Request $req){
        $product = Sanpham::where('masp', $req->masp)->first();
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $req->masp);
        $req->session()->put('cart', $cart);
        echo 'ok';
    }

    public function getAddmulticart(Request $req){
        $product = Sanpham::where('masp', $req->masp)->first();
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->addMulti($product, $req->masp, $req->soluong);
        $req->session()->put('cart', $cart);
        echo 'ok';
    }
}
