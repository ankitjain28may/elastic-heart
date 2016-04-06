<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
class Event extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'soc_name', 'event_name', 'event_des','start_time','end_time','society_id', 'type', 'approve', 'duration','type'
    ];
protected $table = "events";
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    public $timestamps = false;
    public static function createEvent($data)
    {
        $event = new Event;
        $event->event_name = $data['event_name'];
        $event->event_des = $data['event_des'];
        $event->start_time = $data['start_date']. "--" . $data['start_time'];
        $event->end_time = $data['end_date']. "--" . $data['end_time'];
        $event->society_id = \Auth::user()->id;
        $event->type = $data['event_type'];
        $event->approve = 0;
        if(!strcmp($data['event_type'],'4')){
        $event->duration = $data['duration'];

        }
        $event->save();
        return $event;
    }
}