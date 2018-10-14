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
});

// Route::get('/admin/dashboard', function () {
//     // return trans("messages.dashboard");
//     return trans("messages.test");
// })->name("home")->middleware("lang");;

// // Route::get('/{name}', function($name) {
// //     return redirect()->route('home');
// // });

// Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');

// Route::resource('dashboard', 'DashboardController');

/**
 * Login
 */
Route::get('/login', 'MyAuth\LoginController@showLogin');
Route::post('/login', 'MyAuth\LoginController@doLogin')->name('do_login');

// Products Page
Route::resource('products', 'ProductController');
Route::get('products/{product}', 'ProductController@destroy')->name('products.delete');

// Categories Page
Route::resource('categories', 'CategoryController');
Route::get('categories/{category}', 'CategoryController@destroy')->name('categories.delete');

// Users Page
Route::resource('users', 'UserController', ['except' => 'destroy']);
Route::get('users/{user_id}', 'UserController@destroy')->name('users.delete');

// Orders Page
Route::resource('orders', 'OrderController', ['except' => 'destroy']);
Route::get('orders/{order}', 'OrderController@destroy')->name('orders.delete');

// Download to excel
Route::get('exportXLS', 'Export@exportXLS')->name('users.export_xls');
// Download to pdf
Route::get('exportPDF/{user_id}', 'UserController@exportPDF')->name('users.export_pdf');
