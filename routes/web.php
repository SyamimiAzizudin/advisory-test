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

// Middleware for Admin
Route::group(['middleware' => 'admin'], function() {

	// crud for user
	Route::resource('/user', 'UserController');

	// crud for listing
	Route::resource('/listing', 'ListingController');

	// get api for user
	Route::get('/login/{id}', 'UserController@userApi')->name('User Login API');

	// get api for listing created by specific user
	Route::get('/listings/{id}', 'UserController@listingApi')->name('Listing Module API');

});
