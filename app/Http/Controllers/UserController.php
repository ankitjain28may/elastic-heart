<?php
namespace App\Http\Controllers;

use Auth;
use Input;
use Session;
use Validator;
use Socialite;
use App\UserDetails;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


use App\User;

class UserController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function social_redirect_g($provider){
        return Socialite::with('google')->redirect();
    }

    public function social_callback_g($provider){
        $user = Socialite::driver($provider)->user();
        $data = ['name'=> $user->getName(),
                'google'=> $user->getEmail(),
                'facebook'=> $user->getEmail()];

        Auth::login(User::firstOrCreate($data));
        
        Session::put('email', $user->getEmail());
        
        return Redirect::intended('dashboard');
    }

    public function social_redirect_f($provider){
        return Socialite::with('facebook')->redirect();
    }

    public function social_callback_f($provider){
        $user = Socialite::driver($provider)->user();
        $data = ['name'=> $user->getName(),
                'google'=> $user->getEmail(),
                'facebook'=> $user->getEmail()];

        Auth::login(User::firstOrCreate($data));
        
        Session::put('email', $user->getEmail());
        
        return Redirect::intended('dashboard');
    }

    public function logout(){
        Auth::logout();
        return Redirect::route('root');
    }
    
}
