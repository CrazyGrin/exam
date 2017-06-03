<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//User
Route::group(['prefix' => '/user'], function () {
	//index
	Route::get('/index','User\UserController@index');

	//login
	Route::get('/login','User\UserController@loginPage');
	Route::post('/login','User\UserController@login');

	//logout
	Route::get('/logout','User\UserController@logout');
	//register
	Route::get('/create','User\UserController@createPage');
	Route::post('/create','User\UserController@create');

	//update
	Route::post('/user/update','User\UserController@update');

	//show
	// Route::group(['prefix' => '/show/{num}'], function () {
	//Route::get('/','User\UserController@show');
	// });
});
//Class
Route::group(['prefix' => '/course'], function () {
	Route::get('/{num}','Course\CourseController@showCourseByNum');
});