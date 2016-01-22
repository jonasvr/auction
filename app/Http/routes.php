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

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');//wat?
Route::get('/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('/password/email', 'Auth\PasswordController@getEmail');
Route::post('/password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('/password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('/password/reset', 'Auth\PasswordController@postReset');


// language setting
Route::get('/language/{lng}',['as'=> 'language', 'uses'=> 'LanguageController@chooser']);


Route::get('/',  ['as' => '/', 'uses' => 'HomeController@home']);

Route::get('/adminPage',  					['as' => 'admin', 	'uses' => 'AdminController@index']);
Route::get('/admin/{art_id}',  	['as' => 'delete', 	'uses' => 'AdminController@delete']);

Route::get('/admin', function() {
    if (Auth::user()->id==1) {
      return Redirect::action('AdminController@index');
    }
    else {
        return Redirect::action('HomeController@home');
    }
});
Route::get('/faq',   ['as' => 'faq', 'uses' => 'MainController@getFaqs']);
Route::get('/isearch', ['as' => 'isearch', 'uses' => 'MainController@isearch']);



Route::get('/contact', function(){ return View('contact.contact');});
Route::get('/contact/{art_id}/{title}',     ['as' => 'artcontact', 		 'uses' => 'ContactController@artcontact']);
Route::post('/contact', 				            ['as' => 'confirmContact', 'uses' => 'ContactController@contact']);

Route::group(['middleware' => 'auth'], function () {
  // Password reset link request routes...
  Route::get('update', 'UpdatePasswordController@getUpdate');
  Route::post('update', 'UpdatePasswordController@postUpdate');

  Route::get('watchlist/addToWList/{art_id}',	['as' => 'addToWl',			   'uses' => 'ProfileController@addToWatchList']);
	Route::get('watchlist/{art_id}',  					['as' => 'deleteWL', 			 'uses' => 'ProfileController@deleteFromWatchList']);
	Route::get('watchlist/',  									['as' => 'watchlist', 			 'uses' => 'ProfileController@myWatchList']);


  Route::get('/profile/myAuctions',          	['as' => 'myAuctions',     'uses' => 'ProfileController@myAuctions']);
  Route::get('/profile/myBids',              	['as' => 'myBids',         'uses' => 'ProfileController@myBids']);
  Route::get('/profile/{art_id}',  						['as' => 'deleteWL', 			 'uses' => 'ProfileController@deleteFromWatchList']);
	Route::get('/profile', 											['as' => 'profile', 			 'uses' => 'ProfileController@profile']);
	Route::get('/profile/delete/{not_id}', 			['as' => 'deleteNot', 		 'uses' => 'ProfileController@deleteNot']);
	Route::get('/checknote','ProfileController@checknoti');//kijken of er een notification is

	Route::post('/art/bid', 				      		['as' => 'bid', 			     'uses' => 'ArtController@bid']);
  Route::get('/art/new', 					          ['as' => 'new',				     'uses' => 'ArtController@newArt' ]);
  Route::post('/art/addArt', 				        ['as' => 'addArt', 			   'uses' => 'ArtController@addArt']);
  Route::get('/art/buy/{art_id}',           ['as' => 'buynow',			   'uses' => 'ArtController@buyNow' ]);

});

Route::get('/art',			              	        ['as' => 'overview',			 'uses' => 'MainController@overview' ]);
Route::get('art/detail/{id}', 			            ['as' => 'detail',			   'uses' => 'ArtController@getDetail' ]);
Route::get('/art/{filter}/{value}',    	        ['as' => 'overviewFilter',	'uses' => 'MainController@overviewFilter' ]);
Route::get('/art/style/{style}',			          ['as' => 'overviewStyle',	 'uses' => 'MainController@filterStyle' ]);
Route::get('/art/price/{price}',			          ['as' => 'overviewPrice',	 'uses' => 'MainController@filterPrice' ]);
Route::get('/art/era/{era}',			              ['as' => 'overviewEra',	   'uses' => 'MainController@filterEra' ]);
Route::get('/art/when/{when}',			            ['as' => 'overviewWhen',	 'uses' => 'MainController@filterWhen' ]);
Route::post('/art/search',	                    ['as' => 'search',			   'uses' => 'MainController@search' ]);
Route::get('/art/search/{filter}/{value}',      ['as' => 'searchFilter',			   'uses' => 'MainController@searchFiltert' ]);
