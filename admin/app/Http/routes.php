<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
Route::get('view_event', array('as'=>'view_event','uses'=>'PagesController@view_event'));
Route::get('/', array('as'=>'root','uses'=>'AuthController@home'));
Route::post('login', array('before'=>'csrf','uses'=>'AuthController@login'));
Route::get('logout', array('as'=>'logout','uses'=>'AuthController@logout'));
Route::get('dashboard', array('as'=>'dashboard','uses'=>'PagesController@dashboard'));
Route::get('add_event', array('as'=>'add_event','uses'=>'PagesController@add_event_form'));
Route::post('addevent', array('before'=>'csrf','uses'=>'PagesController@addevent'));
Route::get('add_questions', array('as'=>'add_question','uses'=>'PagesController@add_questions_form'));
Route::post('addquestions', array('before'=>'csrf','uses'=>'PagesController@addquestions'));
Route::get('view_question', array('as'=>'view_question','uses'=>'PagesController@view_question'));


Route::get('/editevent/{id}',array('as'=>'editevent','uses'=>'PagesController@editevent'));
Route::post('edit_event',array('before'=>'csrf','uses'=>'PagesController@edit_event'));
Route::get('/deleteevent/{id}',array('as'=>'deleteevent','uses'=>'PagesController@deleteevent'));
});
