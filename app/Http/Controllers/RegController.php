<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class RegController extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	public function signup(){
		$data = Input::all();
		$rules=array(
			'name'=>'required',
			'email'=>'required',
			'password'=>'required|confirmed',
			'password_confirmation'=>'required',
			'avatar'=>'required'
			);
		$validator = Validator::make($data, $rules);
		if($validator->fails()){
			return json_encode($validator->errors());
		}
		else {
			
		}	        
	}
	public function login(){

	}
}










