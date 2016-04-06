<?php
use App\User;
use App\Question;
use Illuminate\Support\Facades\Redirect;

Route::group(['middleware'=>'web'], function(){

	Route::group(['domain' => '{event}.zealicon.in'], function ($event) {


		Route::get('/', ['as'=>'root', 'uses'=>'PagesController@root']);
		Route::get('ss', function(){

			dd(time());
			//return serialize(['a'=>'abhay', 'b'=>'rawat', 'c'=>'aby', 'd'=>'awat']);
			$x = User::orderByRaw("RAND()")->pluck('id')->toArray();
			$event = "khoj";
			dd($x);

			$ques = Question::where('event_id', 2)->orderByRaw('RAND()')->get()->take(1)->toArray();
			dd($ques);
		});
		// Route::get('/', function($event){return Redirect::route('as');});
		Route::get('social/google', ['as'=>'social_login', 'uses'=>'UserController@social_redirect_g']);
		Route::get('social/facebook', ['as'=>'social_login', 'uses'=>'UserController@social_redirect_f']);
		Route::post('login', ['uses'=>'RegController@login']);
		Route::post('signup', ['uses'=>'RegController@signup']);
		Route::group(['middleware'=>'auth'], function(){
		// All the GET routes ====>
			// Route::get('dashboard', ['as'=>'dashboard_event', 'uses'=>'pagesController@dashboard_event']);
			Route::get('battleground', ['as'=> 'battleground', 'uses'=>'PagesController@battleground']);
			Route::get('leaderboard', ['as'=>'leaderboard', 'uses'=>'PagesController@leaderboard']);
			Route::get('waiting', ['as'=>'waiting', 'uses'=>'PagesController@wait']);
			Route::get('rules', ['as'=>'rules', 'uses'=>'PagesController@rules']);
			Route::get('upload', ['as'=>'upload', 'uses'=>'PagesController@upload']);
			Route::get('fetch/{level}', ['uses'=>'OpController@fetch_ques']);
			

			// All the POST routes ====>
			Route::post('upload', ['as'=>'upload', 'uses'=>'OpController@upload']);
			Route::post('single_corr', ['as'=>'', 'uses'=>'OpController@check_single_corr']);
			Route::post('mcq_corr', ['as'=>'', 'uses'=>'OpController@check_mcq']);
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

