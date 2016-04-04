<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Score;
use App\Message;
use App\Question;
use App\Event;
use App\User;
use App\UserDetails;
use App\Answers;
use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;


class RegController extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function login()
	{
		$user=array(
			"email"=>Input::get('email'),
			"password"=>Input::get('password')
			);
		if(\Auth::attempt($user))
		{
			Session::put('email', $user['email']);

			return 1;
		}
		else
		{
			return "Incorrect Email Password Combination!!!";
		}

	}


	public function signup()
	{
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
			$user = new User;
			$user->email=$data['email'];
			$user->password=\Hash::make($data['password']);
			$user->name = $data['name'];
			$user->avatar = $data['avatar'];
			$user->save();
			Session::put('email',$user->email);

			$user=array("email"=>$data['email'],
				"password"=>$data['password']
				);
			$use = User::where('email',$data['email'])->first();
			\Auth::attempt($use);
			
			Session::put('email',$user['email']);
			Session::put('name',$data['name']);
			return 1;    
		}
	}








