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
    'event_id', 'question', 'options', 'image','html','type','level'
    ];
    protected $table = "questions";
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
}
