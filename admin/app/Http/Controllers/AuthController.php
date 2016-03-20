<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;
use Redirect;
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
    	  $data = array('email'=>Input::get('email'),'password'=>Input::get('password'));
        $rules=array(
            'email' => 'required',
            'password' => 'required'
            );
        $validator = Validator::make($data, $rules);
        if($validator->fails()){

    // send back to the page with the input data and errors
            return Redirect::to('/')->withErrors($validator->errors())->withInput();
      //  return Redirect::back()->withErrors($validator->errors())->withInput();
        }
        else {
            if(Auth::guard('seller')->attempt($data)){
                Session::put('seller_email',$data['email']);
                return Redirect::to('store');
            }
            else{
                return Redirect::to('store/login')->with('message','Your email/password combination is incorrect!')->withInput();
            }
        }
    }
}
