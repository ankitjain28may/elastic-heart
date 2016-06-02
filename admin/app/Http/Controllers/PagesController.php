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
  public function add_questions_form(){
    if (Session::get('event_id')!=null) {
      $type = Event::where('id',Session::get('event_id'))->first()->type;
      return View::make('add_questions',['type'=>$type]);     
    }
    return Redirect::to('/');

  }
 
public function addmore(){
  return Redirect::route('add_questions',['event_id'=>Session::get('event_id')]);
}
public function view_event(){
  $data=Event::where('society_id',Auth::user()->id)->get(); 
  $t = $data->toArray();  
  if(empty($t))
    $data = "";
  
  return View::make('view_events',['data'=>$data]);
}
public function view_questions(){
  return View::make('view_questions');
}

public function editevent($id)
{

  $data=Event::where('id','=',$id)->get();
  Session::put('event_id',$id);
  $start = explode(" ",$data[0]->start_time);
  $end = explode(" ",$data[0]->end_time);
  return \View::make('editevent',['data'=>$data,'start'=>$start,'end'=>$end]);
}
public function viewquestions($id)
{
  $data=Question::where('event_id','=',$id)->get();
  Session::put('event_id',$id);
  $ans = array();
  foreach($data as $d){
  $ans[]  = Answer::where('ques_id',$d->id)->first()->toArray(); 
 }
 return \View::make('view_questions',['data'=>$data,'ans'=>$ans]);
}

public function editquestion($id)
{
 $data=Question::where('id','=',$id)->first();
 Session::put('qid',$id);
 $type = Event::where('id',$data->event_id)->first()->type;
 $ans = Answer::where('ques_id',$id)->get()->pluck('answer')->toArray();
 return \View::make('edit_ques',['data'=>$data,'type'=>$type,'ans'=>$ans]);
}

  //$data=Question::where('event_id','=',Session::get('event_id'));

}