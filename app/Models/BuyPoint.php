<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuyPoint extends Model
{
    protected $fillable = [
        'user_id',
        'price',
        'point',
    ];

    protected $table = 'buy_points';
}
