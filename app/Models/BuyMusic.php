<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuyMusic extends Model
{
    protected $fillable = [
        'user_id',
        'music_id',
        'price',
        'point',
    ];

    protected $table = 'buy_musics';
}
