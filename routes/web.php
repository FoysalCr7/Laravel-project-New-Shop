<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', 'NewShopController@index')->name('/');

Route::get('/categoryProduct/{id}', 'NewShopController@categoryProduct')->name('/categoryProduct');
Route::get('/Productdetails/{id}', 'NewShopController@productDetails')->name('/Productdetails');

Route::post('/add/cart', 'CartController@addCart')->name('/add/cart');
Route::get('/cart/show', 'CartController@showCart')->name('/cart/show');
Route::get('/checkout', 'CheckController@index')->name('/checkout');
Route::get('/checkout/shipping', 'CheckController@shippingForm')->name('/checkout/shipping');
Route::post('/new/shipping', 'CheckController@shippingSave')->name('/new/shipping');
Route::get('/checkout/payment', 'CheckController@paymentForm')->name('/checkout/payment');
Route::post('/new/order', 'CheckController@newOrder')->name('/new/order');
Route::get('/complete/order', 'CheckController@completeOrder')->name('/complete/order');
Route::get('/delete/cart/{id}', 'CartController@deleteCart')->name('/delete/cart');
Route::post('/customer/signup', 'CheckController@customeSignUp')->name('/customer/signup');
Route::post('/customer/login', 'CheckController@customerLogin')->name('/customer/login');
Route::get('/customer/login/new', 'CheckController@newCustomerLogin')->name('/customer/login/new');
Route::post('/customer/logout', 'CheckController@customerLogout')->name('/customer/logout');
//Route::post('update/cart', 'CartController@updateCart')->name('/update/cart');

Route::get('/MailUs', 'NewShopController@MailUs')->name('MailUs');

Route::get('/category/add', 'CategoryController@index')->name('/category/add');
Route::post('/category/save', 'CategoryController@save')->name('/category/save');
Route::get('/category/manege','CategoryController@manegeCategory')->name('/category/manege');
Route::get('/category/unpublished/{id}','CategoryController@UnpublishedCategory')->name('/category/unpublished');
Route::get('/category/published/{id}','CategoryController@publishedCategory')->name('/category/published');
Route::get('/category/edit/{id}','CategoryController@editCategory')->name('/category/edit');
Route::post('/category/update/','CategoryController@updateCategory')->name('/category/update');
Route::get('/category/delete/{id}','CategoryController@deleteCategory')->name('/category/delete');

Route::get('/brand/add','BrandController@index')->name('/brand/add');
Route::post('/brand/new','BrandController@brandSave')->name('/brand/new');
Route::get('/brand/manege','BrandController@manegeBrand')->name('/brand/manege');
Route::get('/brand/unpublished/{id}','BrandController@UnpublishedBrand')->name('/brand/unpublished');
Route::get('/brand/published/{id}','BrandController@publishedBrand')->name('/brand/published');
Route::get('/brand/edit/{id}','BrandController@editBrand')->name('/brand/edit');
Route::post('/brand/update/','BrandController@updateBrand')->name('/brand/update');
Route::get('/brand/delete/{id}','BrandController@deleteBrand')->name('/brand/delete');


Route::get('/product/add','ProductController@index')->name('/product/add');
Route::post('/product/new','ProductController@productSave')->name('/product/new');
Route::get('/product/manege','ProductController@productManege')->name('/product/manege');
Route::get('/product/unpublished/{id}','ProductController@UnpublishedProduct')->name('/product/unpublished');
Route::get('/product/published/{id}','ProductController@publishedProduct')->name('/product/published');
Route::get('/product/edit/{id}','ProductController@editProduct')->name('/product/edit');
Route::post('/product/update/','ProductController@updateProduct')->name('/product/update');
Route::get('/product/delete/{id}','ProductController@deleteProduct')->name('/product/delete');

Route::get('/manege/order','ManegeOrderController@manegeOrder')->name('/manege/order');
Route::get('/view/order-Details/{id}','ManegeOrderController@viewOrderdetails')->name('/view/order-Details');
Route::get('/view/order-invoice/{id}','ManegeOrderController@viewOrderInvoice')->name('/view/order-invoice');
Route::get('/invoice/download/{id}','ManegeOrderController@downloadOrderInvoice')->name('/invoice/download');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
