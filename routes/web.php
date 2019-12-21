<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'client' ,'middleware'=>'clientLogin'], function(){
	Route::get('doimatkhau', [
		'as'=>'doi-mat-khau',
		'uses'=>'AccountController@getDoimatkhau'
	]);

	Route::post('doimatkhau', [
		'as'=>'doi-mat-khau',
		'uses'=>'AccountController@postDoimatkhau'
	]);

	Route::get('thongtintaikhoan/{id}', [
		'as'=>'thong-tin-tai-khoan',
		'uses'=>'PageController@getThongtinkhachhang'
	]);

	Route::get('dangxuat', [
		'as'=>'dang-xuat',
		'uses'=>'AccountController@getDangxuat'
	]);

	Route::post('capnhatthongtin', [
		'as'=>'cap-nhat-thong-tin',
		'uses'=>'PageController@postThongtinkhachhang'
	]);

	Route::post('capnhatthongtintaikhoan', [
		'as'=>'cap-nhat-thong-tin-tai-khoan',
		'uses'=>'PageController@postThongtintaikhoan'
	]);
});

Route::get('index', [
    'as'=>'trang-chu',
    'uses'=>'PageController@getIndex'
]);	

Route::get('loaisanpham/{loai}', [
	'as'=>'loai-san-pham',
	'uses'=>'PageController@getLoaiSp'
]);

Route::get('chitietsanpham/{masp}', [
	'as'=>'chi-tiet-san-pham',
	'uses'=>'PageController@getChiTietSp'
]);

Route::get('lienhe', [
	'as'=>'lien-he',
	'uses'=>'PageController@getLienHe'
]);

Route::post('lienhe', [
	'as'=>'lien-he',
	'uses'=>'PageController@postLienhe'
]);

Route::get('gioithieu',[
	'as'=>'gioi-thieu',
	'uses'=>'PageController@getGioiThieu'
]);

Route::get('themgiohang/{masp}', [
	'as'=>'them-gio-hang',
	'uses'=>'PageController@getThemgiohang'
]);

Route::get('themnhieugiohang/{masp}', [
	'as'=>'them-nhieu-gio-hang',
	'uses'=>'PageController@getThemnhieugiohang'
]);

Route::get('xoagiohang/{masp}', [
	'as'=>'xoa-gio-hang',
	'uses'=>'PageController@getXoagiohang'
]);

Route::get('dangnhap', [
	'as'=>'dang-nhap',
	'uses'=>'AccountController@getDangnhap'
]);

Route::post('dangnhap', [
	'as'=>'dang-nhap',
	'uses'=>'AccountController@postDangnhap'
]);

Route::get('dangki', [
	'as'=>'dang-ki',
	'uses'=>'AccountController@getDangki'
]);

Route::post('dangki', [
	'as'=>'dang-ki',
	'uses'=>'AccountController@postDangki'
]);


Route::get('dathang', [
	'as'=>'dat-hang',
	'uses'=>'PageController@getDathang'
]);

Route::post('dathang', [
	'as'=>'dat-hang',
	'uses'=>'PageController@postDathang'
]);

Route::get('timkiem', [
	'as'=>'tim-kiem',
	'uses'=>'PageController@getTimkiem'
]);

Route::post('dangkinhantin', [
	'as'=>'dang-ki-nhan-tin',
	'uses'=>'PageController@postDangkinhantin'
]);

Route::get('donhang/{email}', 'AjaxController@getDonhang');

// Route::get('timkiemAjax/{str}', 'AjaxController@getTimkiem');

Route::get('timkiemAjax', 'AjaxController@getTimkiem')->name('timkiemAjax');

Route::get('quenmatkhau', [
	'as'=>'quen-mat-khau',
	'uses'=>'AccountController@getQuenmatkhau'
]);

Route::post('quenmatkhau', [
	'as'=>'quen-mat-khau',
	'uses'=>'AccountController@postQuenmatkhau'
]);

Route::get('khoiphuc/{email}/{code}', [
	'as'=>'khoi-phuc',
	'uses'=>'AccountController@getKhoiphuc'
]);

Route::post('khoiphuc', [
	'as'=>'khoi-phuc',
	'uses'=>'AccountController@postKhoiphuc'
]);


Route::get('checkout', [
	'as'=>'kiem-tra-gio-hang',
	'uses'=>'PageController@getCheckout'
]);

Route::get('capnhatAjax', 'AjaxController@getUpdatecart')->name('capnhatAjax');