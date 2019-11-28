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

Route::get('/', function () {
    return view('welcome');
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
	'uses'=>'PageController@getDangnhap'
]);

Route::post('dangnhap', [
	'as'=>'dang-nhap',
	'uses'=>'PageController@postDangnhap'
]);

Route::get('dangxuat', [
	'as'=>'dang-xuat',
	'uses'=>'PageController@getDangxuat'
]);

Route::get('dangki', [
	'as'=>'dang-ki',
	'uses'=>'PageController@getDangki'
]);

Route::post('dangki', [
	'as'=>'dang-ki',
	'uses'=>'PageController@postDangki'
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

Route::get('donhang/{email}', 'AjaxController@getDonhang');

Route::get('timkiemAjax/{str}', 'AjaxController@getTimkiem');