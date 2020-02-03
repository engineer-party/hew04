<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements \Illuminate\Contracts\Auth\Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $table = 'users';
}
