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
use Session;
use App\Society;
use App\Event;
use App\Message;
use App\Question;
use App\Score;
use App\User;
use App\UserDetails;
class PagesController extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	public function __construct(){
		$this->middleware('auth');
	}
	public function dashboard(){
		return View::make('dashboard');	
	}
	public function add_event_form(){
		return View::make('add_event');	
	}
	public function addevent(){
		$data = Input::all();
		$data['society_id'] = Society::where('username',Session::get('username'))->first()->id; 
		$event = Event::createEvent($data);
		Session::put('event_id',$event->id);
		return Redirect::to('add_questions');
	}
	public function add_questions_form(){
		if (Session::get('event_id')!=null) {
		return View::make('add_questions');			
		}
		return Redirect::to('/');

	}
	public function addquestions(){

	}
	public function view_event(){
		return View::make('veiw_events');
	}

}
