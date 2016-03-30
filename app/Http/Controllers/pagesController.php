<?php 
namespace app\Http\Controllers;
use View;
use Auth;
use App\Event;
use App\Score;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Controller as BaseController;

define('redirect_home', "http://google.com");
class PagesController extends BaseController{


	public function root($event){
		$event = Event::where('event_name', $event)->first();
		if($event == null){
			return redirect(redirect_home);
		}
		if(Auth::check()){
			return Redirect::intended('battleground');
		}
		// dd($_SERVER);
		return View::make('welcome');
	}

	public function plexus_dashboard(){
		$ongoing = [];
		$upcoming = [];
		$events = Event::where('approve', 1)->get()->toArray();
		// For Indian time zone
		// adding 5:30 hrs (time IST is ahead of GMT)
		$now = time() + 5.5 * 60 * 60;
		foreach ($events as $event) {
			$start = strtotime($event['start_time']);
			$end = strtotime($event['end_time']);

			if($start < $now && $end > $now){
				array_push($ongoing, $event);
			}else{
				array_push($upcoming, $event);
			}
		}

		$return_values = ['ongoing'=> $ongoing , 'upcoming'=> $upcoming];
		return View::make('home', $return_values);
	}

	public function battleground($event){
		
		$event = Event::where('event_name', $event)->first();

		if($event == null){
			return redirect(redirect_home);
		}
		$start = strtotime($event->start_time);
		$end = strtotime($event->end_time);
		$now = time() + 5.5 * 60 * 60;
		if($end < $now){
			//Event has finished ...
			return Redirect::route('winners', $event);
		}else if($start < $now && $end > $now){
			//Event is ongoing ...
			
			return View::make('arena', ['event'=>$event]);
			//return more values to spice it up?? 
		}else{
			//Event hasn't started yet ...
			abort(404);
			return Redirect::route('dashboard');
			//can make this interesting ??
			//perhaps a waiting area.. ?  <<<---- To be done...
		}
	}

	public function dashboard_event(){
		$event = Event::where('event_name', $event)->first();
		if($event == null){
			return redirect(redirect_home);
		}

	}
}
?>