<?php
use App\User;
use Illuminate\Support\Facades\Redirect;

Route::group(['middleware'=>'web'], function(){

	Route::group(['domain' => '{even}.plexus.dev'], function () {

		Route::get('/', ['as'=>'root', 'uses'=>'PagesController@root']);
		Route::get('ss', function(){
			return User::find(2)->id;
		});
		// Route::get('/', function($event){return Redirect::route('as');});
		Route::get('social/{provider}', ['as'=>'social_login', 'uses'=>'UserController@social_redirect_g']);
		
		Route::group(['middleware'=>'auth'], function(){
		// All the GET routes ====>
			Route::get('dashboard', ['as'=>'dashboard', 'uses'=>'pagesController@dashboard']);
			Route::get('/battleground/{event}', ['as'=> 'battleground', 'uses'=>'pagesController@battleground']);

		// All the POST routes ====>

		});
	});
	Route::get('/', ['uses'=> 'PagesController@plexus_dash']);
	Route::get('social/callback/{provider}', ['uses'=>'UserController@social_callback_g']);



	//<---Routes only for authenticated users--->


	Route::get('logout', ['uses'=>'UserController@logout']);
});

