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
        'event_name', 'event_des','start_time','end_time','society_id', 'type', 'approve','duration','num_ques','active', 'forum'
    ];
protected $table = "events";
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
}
