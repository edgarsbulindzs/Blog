<?php
use Illuminate\Routing\PendingResourceRegistration;

Route::group(['middleware' => 'web'], function () {
    //parastās lapas
    Route::get('/','HomeController@home')->name('home');
    Route::get('/aboutus', 'HomeController@aboutus')->name('aboutus');
    Route::get('/gallery', 'HomeController@Gallery')->name('gallery');
    Route::get('/production', 'HomeController@production')->name('production');
    Route::get('/login','LoginController@login')->name('login');
    //atgriež reģistrācijas formu
    Route::get('/registration/create', 'UserController@create')->name('registration');
//parbauda ievietotos datus un saglabā tos. pēc tam aizsūta uz dashboard kā jau lietotāju
    Route::post('/registration', 'UserController@store');
//Pārbauda vai lietotājs ir reģistrēts un ielagojoties aizsūta uz dashboard
    Route::post('/dashboard','LoginController@authenticate')->name('authen');
//dzēš sesijas datus izlagojoties un aizsūta uz sākumu
    Route::get('/base','LoginController@logout')->name('logout');
//pārbauda vai lietotājs eksistē un ja jā aizsūta uz dashboar ja nē tad uz login formu
    Route::get('/login', 'LoginController@login')->name('login');
//ja neautorizejies lietotājs cenšas iet pa taisno uz dashboard automātiski tiek atmests uz log in
    Route::get('/dashboard','LoginController@red');
//atgriez dashboard linku kurs redzams tikai autorizētiem lietotājiem
    Route::get('/dashboard','HomeController@dashboard')->name('dashboard');
//
});
//atgriez dashboard VIEW
//Route::get('/dashboard','UserController@dsa')->name('dash');
Route::get('/dashboard','DashBoardController@dsa')->name('dash');






Route::get('/blog','ArticlesController@index');


Route::get('/blog/{id}','ArticlesController@show')->name('create');



Route::get('/dashboard/create','ArticlesController@create')->name('CreateART');

Route::post('/dashboard/create','ArticlesController@store')->name('CreateART');

Route::get('blog/{id}/edit','ArticlesController@edit')->name('edit');

Route::post('blog/{id}/edit','ArticlesController@update')->name('update');


Route::delete('/blog/{id}', 'ArticlesController@destroy')->name('del');


Route::post('blog/{id}','ArticlesController@destroy')->name('delete');



