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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Rutas para los usuarios
//Panel de control
Route::get('/user/panel', function(){
    return 'Control panel user';
});
//Rutas para las tiendas.
//Login
Route::get('/shop/login', 'Auth\ShopLoginController@showLoginForm')->name('shop.loginForm');
Route::post('/shop/login', 'Auth\ShopLoginController@login')->name('shop.login');
//Registro
Route::get('/shop/register', 'Auth\ShopRegisterController@showRegistrationForm')->name('shop.registerForm');
Route::post('/shop/register', 'Auth\ShopRegisterController@register')->name('shop.register');
//Panel de control
Route::get('/shop/panel', function(){
    return 'Control panel shop';
});

//Rutas para el admin
//Login
Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.loginForm');
Route::post('admin/login', 'Auth\AdminLoginController@login')->name('admin.login');
//Panel de control
Route::get('/admin/panel', function(){
    dd(Auth::guard('admin'));
    $text = 'User logued ' .  Auth::guard('admin')->user()->name;
    return $text;
});


