<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UserDetails extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_id', 'contact', 'details'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $table = "user_details";
    }
