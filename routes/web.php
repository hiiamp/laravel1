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
    return view('home.index');
})->name('home');
// call login page
Route::get('login', 'LoginController@login')->name('login');
// process data when user login
Route::post('login', 'LoginController@postLogin')->name('login');
// call logout
Route::get('logout', 'LoginController@logout')->name('logout');
// register
Route::get('register', 'LoginController@register')->name('register');
//process register
Route::post('register', 'LoginController@postRegister')->name('register');

