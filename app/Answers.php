<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Question extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'ques_id','score','answer','incorrect'
    ];
    protected $table = "answers";
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
}
