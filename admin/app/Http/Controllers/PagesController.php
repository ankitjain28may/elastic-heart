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
		  $data=Event::all();

		return View::make('view_events',['data'=>$data]);
	}
	public function view_question(){
		return View::make('view_questions');
	}

	 public function editevent($id)
  {
    $data=Event::where('id','=',$id)->get();
    
    $start = explode(" ",$data[0]->start_time);
    //dd($data);
    $end = explode(" ",$data[0]->end_time);
    
    return \View::make('editevent',['data'=>$data,'start'=>$start,'end'=>$end]);
  }
   public function viewquestions($id)
  {
    $data=Question::where('event_id','=',$id)->get();
    $b=serialize($data['options']);
    $data->options=$b;
    
    return \View::make('view_questions',['data'=>$data]);
  }

   public function edit_event()
  {
    $data = Input::all();
    $event=Event::where('id','=',$data['id'])->first();
      $event->event_name=$data['event_name'];
      $event->event_des=$data['event_des'];
      $event->start_time=$data['start_date']. " " .$data['start_time'];
      $event->end_time=$data['end_date'] ." ". $data['end_time'];
  	  $event->save();
    return Redirect::route('editevent', $data['id'])->with('message','Successfully edited');
  }
  public function deleteevent($id)
  {
    $data=Event::where('id','=',$id);
    $data->delete();
    return Redirect::to('view_event');

  }
  public function deletequestion($id)
  {
    $data=Event::where('event_id','=',$id);
    $data->delete();
    return Redirect::to('view_questions');

  }
}
