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
//fontend
Route::get('/', 'HomeController@getindex');

//search
Route::post('search','HomeController@search');
Route::get('/trang-chu',['as' => 'trang-chu', 'uses' => 'HomeController@getindex']);

Route::get('/chi-tiet/{id}', 'ProductController@details_product');

//backend
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'AdminController@show_dashboard');

Route::post('/admin-dashboard', 'AdminController@dashboard');

Route::get('/logout', 'AdminController@logout');
Route::get('/add-product', 'Product@add_product');
Route::get('/all-product', 'Product@all_product');

Route::post('/save-product', 'Product@save_product');

Route::get('/unactive-product/{id}', 'Product@unactive_product');
Route::get('/active-product/{id}', 'Product@active_product');

Route::get('/edit-product/{id}', 'Product@edit_product');

Route::post('/update-product/{id}', 'Product@update_product');

Route::get('/delete-product/{id}', 'Product@delete_product');

// --Login user-- //
Route::get('/login','loginController@viewLogin');
Route::post('/checkLogin','loginController@checkLogin');
	//Route Đăng xuất
Route::get('/logout','loginController@logout');
	//Route Đăng ký
Route::get('/register','registerController@viewRegister');
Route::post('/checkRegister','registerController@checkRegister');
Route::get('/thongbaodangky','registerController@viewThongbaodangky');
// -- End Login User-- //



//login-fb
Route::get('/login-facebook', 'HomeController@Loginfb');
Route::get('facebook_callback', 'HomeController@callfacebook');

//cart
Route::post('/update-qty', 'CartController@update_qty');
Route::post('/save-cart', 'CartController@save_cart');
Route::get('/show_cart', 'CartController@show_cart');
Route::get('/delete-to-cart/{rowId}', 'CartController@delete_to_cart');