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

Route::resource('/user', 'UserController');

Route::resource('/listing', 'ListingController');

// Route::get('/user/{id}/edit', 'HomeController@edit');
// Route::post('/user/{id}', 'HomeController@store');
// Route::patch('/user/{id}', 'HomeController@update');
// Route::delete('/user/{id}/delete', 'HomeController@destroy');