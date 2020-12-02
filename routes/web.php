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

Route::get('/', function () {
    return view('home');
});

//Login
Route::post('/login','AuthController@login')->name('auth.login');
Route::get('/login','PageController@login')->name('page.login');

//Logout
Route::get('/logout', 'AuthController@logout')->name('auth.logout');

//Register
Route::post('/register','AuthController@register')->name('auth.register');
Route::get('/register','PageController@register')->name('page.register');
