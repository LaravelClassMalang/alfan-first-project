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

Route::resource('products', 'ProductController');

Route::resource('users', 'UserController', ['except' => 'destroy']);
Route::get('users/{user}', 'UserController@destroy')->name('users.delete');