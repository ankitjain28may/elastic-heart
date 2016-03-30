<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Score extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_id', 'user_id', 'score','level'
    ];
protected $table = "scores";
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
}
