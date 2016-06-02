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
use App\Answer;
use App\Message;
use App\Question;
use App\Score;
use App\User;
use App\UserDetails;
class EventsController extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
  public function __construct(){
    $this->middleware('auth');
  }
  public function addevent(){
    $data = Input::all();
    $data['society_id'] = Society::where('username',Session::get('username'))->first()->id; 
    $event = Event::createEvent($data);
    Session::put('event_id',$event->id);
    return Redirect::to('add_questions');
  }
  public function edit_event()
  {
    $data = Input::all();
    $event=Event::where('id','=',$data['id'])->first();
    $event->event_name=$data['event_name'];
    $event->event_des=$data['event_des'];
    $event->start_time=$data['start_date']. " " .$data['start_time'];
    $event->end_time=$data['end_date'] ." ". $data['end_time'];
    if($event->type == "4"){
      $event->duration = $data['duration'];
    }
    $event->save();
    return Redirect::route('editevent', $data['id'])->with('message','Succully edited');
  }
  public function deleteevent($id)
  {
    $dat=Event::where('id','=',$id)->get();
    
    if(Auth::user()->privilege > 6 || $dat[0]->society_id == Auth::user()->id){

      $data=Event::where('id','=',$id);
      $data->delete();
      return Redirect::to('view_event');
    }
    else{
      return Redirect::route('dashboard')->with('error',"Access Denied");
    }

  }
}