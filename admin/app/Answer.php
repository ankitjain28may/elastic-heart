<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Answer extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ques_id', 'score','answer','incorrect'
    ];
    public $timestamps = false;
protected $table = "answers";
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
}
