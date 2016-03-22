<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Forget extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'soc_email', 'token'
    ];
protected $table = "forget";
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
}
