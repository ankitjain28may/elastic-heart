<?php

namespace App\Http\Controllers;

use App\Score;
use App\Message;
use App\Question;
use App\Event;
use App\Answers;
use Auth;


use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class OpController extends Controller
{
	public function check_single_corr($event_id){
		$user = Auth::user();
		$data = Input::all();

		$level = $data['level'];
		$answer = $data['answer'];
		// $event_id = $data['event_id'];

		$event = Event::where('event_name', $event_id)->first();

		if($event == null){
			return ['status'=> 0, '_token'=>csrf_token()];
		}
		$start = strtotime($event->start_time);
		$end = strtotime($event->end_time);
		$now = time() + 5.5 * 60 * 60;
		if($end < $now){
			//Event has finished ...
			return ['status'=> 0, '_token'=>csrf_token()];
		}else if($start < $now && $end > $now){

			//Event is ongoing ...
			// dd($event->id);
			$question_tuple = Question::where('level', $level)->where('event_id', $event->id)->first();
			$user_level = Score::where('user_id', $user->id)->where('event_id', $event->id)->first()['level'];
			$randomint = rand(1, Message::count());
			$message = Message::find($randomint);
			$response = [];
			if($user_level == $level - 1){
				$ans = Answers::where('ques_id', $question_tuple->id)->first();
				if($ans['answer'] == $answer){
					$score = Score::where('user_id', $user->id)->where('event_id', $event->id)->first();
					$score->score += $ans['score'];
					$score->level += 1;
					$score->updated_at = date('Y-m-d H:i:s', time());
					$score->save();

					if($level == $event->num_ques){
						$response['reload'] = 1;
						return $response;
					}
					//if level == num_ques then display over page...

					$next_q = Question::where('event_id', $event->id)->where('level', $level + 1)->first();
					$response['status'] = 1;
					$response['message'] = $message->correct;
					$response['question'] = $next_q;
					if($next_q->html != "" || $next_q->html != null)
						$response['html'] = $next_q->html;
					if($next_q->image != "" || $next_q->image != null)
						$response['image'] = $next_q->image;
					$response['level'] = $level + 1;
					$response['rank'] = self::rank($event_id);
					$response['_token'] = csrf_token();
					return $response;
				}else{
					$response['status'] = 0;
					$response['message'] = $message->incorrect;
					$response['rank'] = self::rank($event_id);
					$response['_token'] = csrf_token();
				}
			}

			//for event type == 3 sc w/ bt and input
			//do something else..
			
			return $response;
			//return more values to spice it up?? 
		}else{
			//Event hasn't started yet ...
			return ['status'=> 0, '_token'=>csrf_token()];
			//can make this interesting ??
			//perhaps a waiting area.. ?  <<<---- To be done...
		}
	}


	public function check_mcq($event_id){
		$user = Auth::user();
		$data = Input::all();
		$answer = $data['ans'];
		// $event_id = $data['event_id'];
		$event = Event::where('event_name', $event_id)->first();
		$score = Score::where('user_id', Auth::user()->id)->where('event_id', $event->id);
		$points = 0;
		foreach ($answer as $res) {
			$ans = Answers::where('ques_id', $res['ques_id']);
			if($ans->answer == $res['ans']){
				$points += $ans->score;
			}else{
				$points += $ans->incorrect;
			}
		}
		$score->score = $points;
		$score->save();
		return Redirect::route('end_of_event');
	}

	public function time_check($event_id){
		$user = Auth::user();
		$event_id = $data['event_id'];
		$event = Event::where('event_name', $event_id)->first();
		$score = Score::where('user_id', Auth::user()->id)->where('event_id', $event->id);
		if($score->logged_on + $event->duration * 60 > time()){
			return 1;
		}
		return 0;
	}

	public static function rank($event_id){
		$user = Auth::user();
		$event = Event::where('event_name', $event_id)->first();
		
		$user_score = Score::where('user_id', $user->id)->
		where('event_id', $event->id)->first();
		$rank = Score::where('level', '>', $user_score->level)
		->where('event_id', $event_id)
		->count();
		$rank_same = Score::where('level', $user_score->level)
		->where('event_id', $event_id)
		->where('updated_at', '<' , $user_score->updated_at)
		->count();
		//dd($rank_same);

		return $rank + $rank_same + 1;
	}

	public static function is_live($event_id){
		$event = Event::where('event_name', $event_id)->first();
		$start = strtotime($event->start_time);
		$end = strtotime($event->end_time);
		$now = time() + 5.5 * 60 * 60;
		if($end < $now){
			//Event has finished ...
			return 3;
		}else if($start < $now && $end > $now){
			return 2;
		}else{
			return 1;
		}
	}
	public function upload($event_id){
		$data = Input::all();
		$event = Event::where('event_name', $event_id)->first();
		if($event->type != 3){
			return Redirect::back();
		}else{
			$filename = $event."_".Auth::user()->email;
			if(Input::file('file') != null && Input::file('file') -> isValid()){
	            $destinationPath = 'uploads'; // upload path
	            $extension = Input::file('file') -> getClientOriginalExtension(); // getting image extension
	            $filename .= '.'.$extension; // renameing image
	            Input::file('file')->move($destinationPath, $filename); // uploading file to given path
	        }
	        else{
	    return Redirect::route('upload', $event_id)->with('errormessage', "Looks Like Something Went Wrong");

	        }
	    }
	    return Redirect::route('upload', $event_id)->with('message', "Your File is Successfully Uploaded");
	}

	public function fetch_ques($event_id, $level){
		$user = Auth::user();
		$event = Event::where('event_name', $event_id)->first();
		if($event->type == 2){
			$question_tuple = Question::where('level', $level)->where('event_id', $event->id)->first();
			if($user->level >= $level - 1){
				return ['status'=>1, 'question'=>$question, 'rank'=>self::rank($event_id)];
			}
		}

		if($event->type == 3){
			$question_tuple = Question::where('level', $level)->where('event_id', $event->id)->first();
			return ['status'=>1, 'question'=>$question_tuple, 'rank'=>self::rank($event_id)];
		}
		return ['status'=>0];
	}
}
