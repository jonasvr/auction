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

Route::get('/language/{lng}',['as'=> 'language', 'uses'=> 'LanguageController@chooser']);


Route::get('/', function () {
    return view('home');
});

Route::get('/profile', function () {
    return view('profile');
});

// Authentication routes...
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');

Route::get('/detail', function(){
	return View('detail');
});

Route::get('/faq', function(){
	return View('FAQ');
});
Route::get('/isearch', function(){
	return View('isearch');
});
