<?php


Route::get('/','HomeController@home')->name('home');
Route::get('/blog', 'HomeController@blog')->name('blog');
Route::get('/aboutus', 'HomeController@aboutus')->name('aboutus');
Route::get('/gallery', 'HomeController@Gallery')->name('gallery');
Route::get('/production', 'HomeController@production')->name('production');

//Route::get('/login', 'HomeController@login')->name('login');

Route::get('/registration/create', 'UserController@create')->name('registration');
Route::post('/registration', 'UserController@store');


//functionnality routes

Route::get('/login', 'LoginController@login')->name('login');
Route::post('/login','LoginController@authenticate');










//
//
//
//




