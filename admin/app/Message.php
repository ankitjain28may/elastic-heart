<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Message extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content', 'cor_incor'
    ];
protected $table = "messages";
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
}
