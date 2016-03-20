<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;
use Auth;
use Redirect;
use View;

class PagesController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
     public function __construct(){
        $this->middleware('auth');
   }
    public function dashboard()
    {
        return View::make('dashboard');	
    }
}
