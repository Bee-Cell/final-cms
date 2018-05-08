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



//group middleware

Route::group(["middleware" => ["admin"]], function(){

	Route::get('/admin', function(){
		return view("layouts.admin");
	});

	Route::resource('admin/users', 'AdminUserController'); //create all routes

});

Route::get('/home', 'HomeController@index')->name('home');







