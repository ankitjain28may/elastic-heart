<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;
use Auth;
use Redirect;
use Session;
use View;
class AuthController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function home()
    {
    	if(Auth::check()){
    		return Redirect::to('dashboard');
    	}
    	else{
    		return View::make('login');
    	}
    }
    public function login()
    {
      $remember = Input::get('remember');
      if(!$remember)
      {
        $remember = 0;
    }
    else
    {
        $remember = 1;
    }
    $user=array(
        "username"=>Input::get('username'),
        "password"=>Input::get('password')
        );
    if(\Auth::attempt($user,$remember))
    {
        Session::put('username', $user['username']);
        return Redirect::to('dashboard');
    }
    else
    {
        return Redirect::to('/')->withInput()->with('message',"Incorrect Username Password Combination!!!");
    }

}
}
