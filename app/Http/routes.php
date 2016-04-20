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



Route::resource('posts', 'PostController');

Route::group(['middleware' => ['web']], function () {

	Route::get('/', 'PageController@getIndex');




	Route::get('v1/posts/destroy/', function() {
 	 return view('posts.destroy');
	});



	Route::get( '/api/v1/posts/{pid?}', 'PostController@index' );
	
}		
);


