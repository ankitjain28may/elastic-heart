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

    public function social_redirect_g(){
        $parts = explode(".", $_SERVER['SERVER_NAME']);
        if(count($parts) == 3){
            $subdomain = $parts[0];
            Session::put('subdomain', $subdomain);
        }
        return Socialite::with('google')->redirect();
    }

    public function social_callback($provider){
        $user = Socialite::driver($provider)->user();
        $data = ['name'=> $user->getName(),
                'email'=> $user->getEmail(),];

        Auth::login(User::firstOrCreate($data));
        
        if(null != Session::get('subdomain')){
            $subdomain = Session::get('subdomain');
            return redirect("http://$subdomain.plexus.dev");
        }
        
        return Redirect::intended('dashboard');
    }

    public function social_redirect_f(){
        return Socialite::with('facebook')->redirect();
    }

    public function logout(){
        Auth::logout();
        return Redirect::route('root');
    }
    
}
