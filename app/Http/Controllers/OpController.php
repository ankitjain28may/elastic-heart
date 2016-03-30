<?php

namespace App\Http\Controllers;

use App\Score;
//use App\Answer;
use App\Message;
use App\Question;


use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class OpController extends Controller
{
	public function check_single_corr(){
		$user = Auth::user();
		$data = Input::all();

		$level = $data['level'];
		$answer = $data['answer'];
		$question = $data['question'];
		$event_id = $data['event_id'];

		$event = Event::where('event_name', $event_id)->first();

		if($event == null){
			return ['status'=> 0];
		}
		$start = strtotime($event->start_time);
		$end = strtotime($event->end_time);
		$now = time() + 5.5 * 60 * 60;
		if($end < $now){
			//Event has finished ...
			return ['status'=> 0];
		}else if($start < $now && $end > $now){
			//Event is ongoing ...
			$question_tuple = Question::find($question);
			$user_level = Score::where('user_id', $user->id)->first()['level'];
			$randomint = rand(1, Message::count());
			$message = Message::find($randomint);
			$response = [];

			if($user_level == $level - 1){
				$ans = Answer::where('ques_id', $question)->first();
				if($ans['answer'] == $answer){
					$score = Score::where('user_id', $user_id)->where('event_id', $event_id)->first();
					$score->score += $ans['score'];
					$score->level += 1;
					$score->updated_at = date('Y-m-d H:i:s', time());
					$score->save();
					$next_q = Question::where('event_id', Session::get('event_id'))->where('level', $level + 1);
					$response['status'] = 1;
					$response['message'] = $message->correct;
					$response['question'] = $next_q->question;
					if($next_q->html != "" || $next_q->html != null)
						$response['html'] = $next_q->html;
					$response['level'] = $level + 1;
					$response['rank'] = self::rank($event_id);
					return $response;
				}else{
					$response['status'] = 0;
					$response['message'] = $message->incorrect;
					$response['rank'] = self::rank($event_id);
				}
			}

			//for event type == 3 sc w/ bt and input
			//do something else..
			
			return $response;
			//return more values to spice it up?? 
		}else{
			//Event hasn't started yet ...
			return ['status'=> 0];
			//can make this interesting ??
			//perhaps a waiting area.. ?  <<<---- To be done...
		}
	}


	public function check_mcq(){
		$user = Auth::user();
		$data = Input::all();
		$answer = $data['ans'];
		$event_id = $data['event_id'];
		$event = Event::where('event_name', $event_id)->first();
		$score = Score::where('user_id', Auth::user()->id)->where('event_id', $event->id);
		$points = 0;
		foreach ($answer as $res) {
			$ans = Answer::where('ques_id', $res['ques_id']);
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

	public function rank($event_id){
		$user = Auth::user();
		$user_score = Score::where('user_id', $user->id)->
							where('event_id', $event_id)->first();
		$rank = Score::where('level', '>', $user_score->level)
						->where('event_id', $event_id)
						->count();
		$rank_same = Score::where('level', $user_score->level)
						->where('updated_at', '<' , $user_score->updated_at);
						->count();

		return $rank + $rank_same + 1;
	}

}
