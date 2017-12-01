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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('products', 'ProductController@index')->name('products');
Route::post('products', 'ProductController@store')->name('products.store');

Route::get('products/create', 'ProductController@create')->name('products.create');

Route::get('products/{product}', 'ProductController@show')->name('products.show');
Route::patch('products/{product}', 'ProductController@update')->name('products.update');
Route::get('products/{product}/edit', 'ProductController@edit')->name('products.edit');

Route::get('reviews/create/{product}', 'ReviewController@create')->name('reviews.create');
Route::post('reviews/create/{product}', 'ReviewController@store')->name('reviews.store');

Route::get('purchase_orders/', 'PurchaseOrderController@index')->name('purchase_orders');
Route::post('purchase_orders/', 'PurchaseOrderController@store')->name('purchase_orders.store');

Route::get('purchase_orders/create/{product}', 'PurchaseOrderController@create')->name('purchase_orders.create');

Route::get('purchase_orders/{purchaseOrder}', 'PurchaseOrderController@show')->name('purchase_orders.show');

Route::get('vendors/products', 'VendorController@products')->name('vendors.products');

Route::post('paypal-checkout', 'AddMoneyController@getCheckout')->name('paypal.checkout');
Route::get('paypal-done', 'AddMoneyController@getDone')->name('paypal.done');
Route::get('paypal-cancel', 'AddMoneyController@getCancel')->name('paypal.cancel');
