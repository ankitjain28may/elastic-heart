<?php
use App\User;
use App\Event;
use Illuminate\Support\Facades\Redirect;

Route::group(['middleware'=>'web'], function(){

	Route::group(['domain' => '{event}.plexus.dev'], function ($event) {


		Route::get('/', ['as'=>'root', 'uses'=>'PagesController@root']);
		Route::get('ss', function(){
			//return serialize(['a'=>'abhay', 'b'=>'rawat', 'c'=>'aby', 'd'=>'awat']);
			$x = User::orderByRaw("RAND()")->pluck('id')->toArray();
			$event = "khoj";
			dd($x);
		});
		// Route::get('/', function($event){return Redirect::route('as');});
		Route::get('social/google', ['as'=>'social_login', 'uses'=>'UserController@social_redirect_g']);
		Route::get('social/facebook', ['as'=>'social_login', 'uses'=>'UserController@social_redirect_f']);
		
		Route::group(['middleware'=>'auth'], function(){
		// All the GET routes ====>
			// Route::get('dashboard', ['as'=>'dashboard_event', 'uses'=>'pagesController@dashboard_event']);
			Route::get('battleground', ['as'=> 'battleground', 'uses'=>'PagesController@battleground']);
			Route::get('leaderboard', ['as'=>'leaderboard', 'uses'=>'PagesController@leaderboard']);
			Route::get('waiting', ['as'=>'waiting', 'uses'=>'PagesController@wait']);
			Route::get('rules', ['as'=>'rules', 'uses'=>'PagesController@rules']);
			Route::get('upload', ['as'=>'upload', 'uses'=>'PagesController@upload']);
			Route::get('fetch/{lev}', ['uses'=>'OpController@fetch_ques']);

			// All the POST routes ====>
			Route::post('single_corr', ['as'=>'', 'uses'=>'OpController@check_single_corr']);
			Route::post('mcq_corr', ['as'=>'', 'uses'=>'OpController@check_mcq']);
			Route::post('upload', ['before'=>'csrf', 'uses'=>'OpController@upload']);
			Route::post('signup', ['uses'=>'UserController@signup']);
		});
	});

	Route::get('/', ['as'=>'root', 'uses'=> 'PagesController@root']);

	Route::get('dashboard', function(){return 'dashboard_plexus';});
	
	Route::get('social/google', ['as'=>'social_login', 'uses'=>'UserController@social_redirect_g']);
	Route::get('social/facebook', ['as'=>'social_login', 'uses'=>'UserController@social_redirect_f']);
	Route::get('social/callback/{provider}', ['uses'=>'UserController@social_callback']);


	//<---Routes only for authenticated users--->


	Route::get('logout', ['as'=>'logout', 'uses'=>'UserController@logout']);
});

