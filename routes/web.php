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

Route::get('/', 'ProductController@index' );
Route::get('product/', 'ProductController@index')->name('product.index');
Route::get('product/show/{id}', 'ProductController@show')->name('product.show');

Route::get('category/{id}', 'CategoryController@index')->name('category.index');

Route::get('subscribe/', 'SubscribeController@verification')->name('subscribe.subscribe');
Route::post('subscribe/', 'SubscribeController@index')->name('subscribe.index');

Route::get('contact/', 'ContactController@index')->name('contact.index');
Route::post('contact/', 'ContactController@send')->name('contact.send');

Route::get('cart/add/', 'CartController@add')->name('cart.add');
Route::get('cart/', 'CartController@show')->name('cart.show');
Route::get('cart/update', 'CartController@update')->name('cart.update');
Route::get('cart/quantity', 'CartController@quantity')->name('cart.quantity');
Route::get('cart/clear', 'CartController@clear')->name('cart.clear');
Route::get('cart/delete', 'CartController@delete')->name('cart.delete');


Route::post('checkout/', 'CheckoutController@index')->name('checkout.index');
Route::get('checkout/', 'CheckoutController@show')->name('checkout.show');

Route::get('/cabinet', 'CabinetController@index')->name('home');
Route::post('/cabinet', 'CabinetController@moderate')->name('cabinet.moderate');

Route::get('cabinet/products', 'AdminProductController@index')->name('adminProducts.index');
Route::get('cabinet/products/create', 'AdminProductController@create')->name('adminProducts.create');
Route::get('cabinet/products/{id}', 'AdminProductController@edit')->name('adminProducts.edit');
Route::post('cabinet/products', 'AdminProductController@store')->name('adminProducts.store');
Route::patch('cabinet/products/{id}', 'AdminProductController@update')->name('adminProducts.update');
Route::delete('cabinet/products/{id}', 'AdminProductController@destroy')->name('adminProduct.destroy');

Route::get('cabinet/categories', 'AdminCategoryController@index')->name('adminCategories.index');
Route::get('cabinet/categories/create', 'AdminCategoryController@create')->name('adminCategories.create');
Route::get('cabinet/categories/{id}', 'AdminCategoryController@edit')->name('adminCategories.edit');
Route::post('cabinet/categories', 'AdminCategoryController@store')->name('adminCategories.store');
Route::patch('cabinet/categories/{id}', 'AdminCategoryController@update')->name('adminCategories.update');
Route::delete('cabinet/categories/{id}', 'AdminCategoryController@destroy')->name('adminCategories.destroy');



Auth::routes();






