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
    	$question_tuple = Question::find($question);
    	$event = 

    	$user_level = Score::where('user_id', $user->id)->first()['level'];
    	$response = [];
    	$randomint = rand(1, Message::count());
   		$message = Message::find($randomint);

    	
    	if($user_level >= $level-1){
    		$ans = Answer::where('ques_id', $question)->first();
    		if($ans['answer'] == $answer){
    			$score = Score::where('user_id', $user_id);
    			$score->score += $ans['score'];
    			$score->level += 1;
    			$score->save();
    			$next_q = Question::where('event_id', Session::get('event_id'))->where('level', $level);
    			$response['status'] = 1;
    			$response['message'] = $message->correct;
    			//----------------------->>> $response['question'] = ;
    			return $response;
    		}else{
    			$response['status'] = 0;
    			$response['message'] = $message->incorrect;
    		}
    	}else{
    		return 'This is wrong on so many levels... :(';
    	}
    }


    public function check_mcq(){
    	$user = Auth::user();
    	$data = Input::all();

    }
}
