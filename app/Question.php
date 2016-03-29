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
    'event_id', 'question', 'answers', 'options', 'image'
    ];
    protected $table = "questions";
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
}
