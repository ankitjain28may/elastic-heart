<?php

Route::get('/', function () {
    return view('welcome');

});

Route::get('home',['as' => 'home','uses' => function () {
    return view('home');

}]);
Route::get('social/login/redirect/{provider}',array('as'=>'social_login', 'uses'=>'Auth\AuthController@redirectToProvider'));
Route::get('social/login/{provider}','Auth\AuthController@handleProviderCallback');


?>
