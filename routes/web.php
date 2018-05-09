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

	Route::resource('admin/users', 'AdminUserController'); //croute user

	Route::resource("admin/posts", "AdminPostController");  //route post


});

Route::get('/home', 'HomeController@index')->name('home');



/*
 		   GET|HEAD  | admin/posts             | posts.index      | App\Http\Controllers\AdminPostController@index                         | web,admin    |
|        | POST      | admin/posts             | posts.store      | App\Http\Controllers\AdminPostController@store                         | web,admin    |
|        | GET|HEAD  | admin/posts/create      | posts.create     | App\Http\Controllers\AdminPostController@create                        | web,admin    |
|        | DELETE    | admin/posts/{post}      | posts.destroy    | App\Http\Controllers\AdminPostController@destroy                       | web,admin    |
|        | PUT|PATCH | admin/posts/{post}      | posts.update     | App\Http\Controllers\AdminPostController@update                        | web,admin    |
|        | GET|HEAD  | admin/posts/{post}      | posts.show       | App\Http\Controllers\AdminPostController@show                          | web,admin    |
|        | GET|HEAD  | admin/posts/{post}/edit | posts.edit       | App\Http\Controllers\AdminPostController@edit                          | web,admin    |
 */



