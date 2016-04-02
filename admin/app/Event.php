<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Event extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'soc_name', 'event_name', 'event_des','start_time','end_time','society_id', 'type', 'approve'
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
        $event->type = $data['type'];
        $event->approve = 0;
        $event->save();
        return $event;
    }
}
