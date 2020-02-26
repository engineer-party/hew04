<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GenreMusicTable extends Model
{
    protected $fillable = [
        'music_id',
        'genre_id',
    ];

    protected $table = 'genre_music';
}
