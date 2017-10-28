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

//Route::get('/', function () {
//    return view('welcome');
//});
//
//Auth::routes();

//Route::get('/', 'HomeController@index')->name('app');

Route::get('/','HomeController@home')->name('home');
Route::get('/blog', 'HomeController@blog')->name('blog');
Route::get('/aboutus', 'HomeController@aboutus')->name('aboutus');
Route::get('/gallery', 'HomeController@Gallery')->name('gallery');
Route::get('/production', 'HomeController@production')->name('production');
Route::get('/login', 'HomeController@login')->name('login');
Route::get('/registration', 'HomeController@registration')->name('registration');

