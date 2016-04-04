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
	public function addevent(){
		$data = Input::all();
		$data['society_id'] = Society::where('username',Session::get('username'))->first()->id; 
		$event = Event::createEvent($data);
		Session::put('event_id',$event->id);
		return Redirect::to('add_questions');
	}
	public function add_questions_form(){
		if (Session::get('event_id')!=null) {
      $type = Event::where('id',Session::get('event_id'))->first()->type;
      return View::make('add_questions',['type'=>$type]);			
    }
    return Redirect::to('/');

  }
  public function addquestions(){
    $data = Input::all();
    $event = Event::where('id',Session::get('event_id'))->first();
    $question = new Question;
    $question->event_id = Session::get('event_id');
    $question->question = $data['question'];
    $image = array();
    if(isset($data['file'])){
    if (Input::file('file')->isValid()){
      $destinationPathvfile = 'uploads';
      $extensionvfile = Input::file('file')->getClientOriginalExtension(); 
      $fileNamevfile = $event->id.'.'.$extensionvfile; // renaming image
      Input::file('file')->move($destinationPathvfile, $fileNamevfile);
      $question->image = $fileNamevfile;
    }
}
    if(isset($data['html'])){
      $question->html = $data['html'];      
    }
    if(intval($event->type) > 2){
     $question->options = serialize($data['options']);
     $answers = $data['answers'];
  $question->save();
  Session::put('qid',Question::all()->last()->id); 

     foreach($answers as $ans){
      $answer = new Answer;
      $answer->ques_id = Session::get('qid');
      $answer->answer = $ans;
      $answer->score = 1;
      $answer->incorrect = 0;
      $answer->save();
    }
  }
  else{
    $question->level = $data['level'];
    $question->save();
  Session::put('qid',Question::all()->last()->id);   
    $answer = new Answer;
    $answer->ques_id = Session::get('qid');
    $answer->answer = $data['answer'];
    $answer->score = 1;
    $answer->incorrect = 0;
    $answer->save();
  }
    Session::put('event_id',$event->id);

  return Redirect::route('viewquestions',['event_id'=>$event->id]);
}


 public function addmore(){
  
   

  return Redirect::route('add_questions',['event_id'=>Session::get('event_id')]);
}
public function view_event(){
  $data=Event::all();

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
    //dd($data);
  $end = explode(" ",$data[0]->end_time);

  return \View::make('editevent',['data'=>$data,'start'=>$start,'end'=>$end]);
}
public function viewquestions($id)
{
  $data=Question::where('event_id','=',$id)->get();
    Session::put('event_id',$id);
//  dd($data);
    foreach($data as $d){
      $d->ans = Answer::where('ques_id',$id)->get()->pluck('answer')->toArray();
    }
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
  

  $data=Question::where('id','=',$id)->first();
  $event_id = $data->event_id;
  $data->delete();

  //$data=Question::where('event_id','=',Session::get('event_id'));
  return Redirect::route('viewquestions',compact('event_id'));

}
}
