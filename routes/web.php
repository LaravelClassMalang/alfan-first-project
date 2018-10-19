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

Route::get('/', function() {
    return view('welcome');
})->name('welcome');

/**
 * Auth
 */
// Login
Route::get('/login', 'MyAuth\LoginController@showLogin')->name('show_login');
Route::post('/login', 'MyAuth\LoginController@doLogin')->name('do_login');
// Logout
Route::get('/logout', 'MyAuth\LoginController@doLogout')->name('do_logout');

/**
 * Dashboard Page
 */
Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');

/**
 * Product Page
 */
Route::resource('products', 'ProductController');
Route::get('products/{product}', 'ProductController@destroy')->name('products.delete');

/**
 * Category Page
 */
Route::resource('categories', 'CategoryController');
Route::get('categories/{category}', 'CategoryController@destroy')->name('categories.delete');

/**
 * User Page
 */
Route::resource('users', 'UserController', ['except' => 'destroy']);
Route::delete('users/{user}', 'UserController@destroy')->name('users.delete');
// Download to excel
Route::get('exportXLS/users', 'Export@exportXLS')->name('users.export_xls');
Route::get('exportXLS', 'UserController@exportXLS')->name('users.export_xls_');
// Download to pdf
Route::get('exportPDF/{user_id}', 'UserController@exportPDF')->name('users.export_pdf');
// Cache Test
Route::get('cacheuser', 'UserController@testCache')->name('users.cache');

/**
 * Order Page
 */
Route::resource('orders', 'OrderController', ['except' => 'destroy']);
Route::get('orders/{order}', 'OrderController@destroy')->name('orders.delete');

/**
 * E-Mail Page
 */
Route::get('e-mails', 'EmailController@index')->name('e-mails.index');
Route::post('e-mails/send', 'EmailController@send')->name('e-mails.send');


