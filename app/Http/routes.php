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

Route::get('/profile', function ()
	{    return view('profile.profile');
});

Route::get('/profile/new', ['as' => 'new', function ()
	{    return view('profile.new');
}]);

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');//wat?
Route::get('/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::get('/faq', function(){
	return View('FAQ');
});
Route::get('/isearch', function(){
	return View('isearch');
});


Route::get('art/detail/{id}', 			       ['as' => 'detail',			  'uses' => 'ArtController@getDetail' ]);

Route::get('/contact', function(){
	return View('contact.contact');
});

Route::get('/contact/{art_id}/{title}',    ['as' => 'artcontact', 		'uses' => 'MainController@artcontact']);
Route::post('/contact', 				           ['as' => 'contact', 			  'uses' => 'MainController@contact']);

Route::group(['middleware' => 'auth'], function () {

  Route::get('profile/addToWList/{art_id}',	['as' => 'addToWl',			'uses' => 'ProfileController@addToWatchList']);
  Route::get('profile/myAuctions',          ['as' => 'myAuctions',   'uses' => 'ProfileController@myAuctions']);
  Route::get('profile/myBids',              ['as' => 'myBids',   'uses' => 'ProfileController@myBids']);
  Route::post('/profile/bid', 				      ['as' => 'bid', 			  'uses' => 'ArtController@bid']);

  Route::get('/art/new', 					          ['as' => 'new',				  'uses' => 'ArtController@newArt' ]);
  Route::post('/art/addArt', 				        ['as' => 'addArt', 			'uses' => 'ArtController@addArt']);
  Route::get('art/buy/{art_id}',            ['as' => 'buynow',			'uses' => 'ArtController@buyNow' ]);


});
