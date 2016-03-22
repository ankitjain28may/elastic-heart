<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Society extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'soc_name', 'email', 'password','privilege','username'
    ];
protected $table = "society";
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
