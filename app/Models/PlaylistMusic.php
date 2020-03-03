<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlaylistMusic extends Model
{
    protected $fillable = [
        'playlist_id',
        'user_id',
        'order',
    ];

    protected $table = 'playlist_musics';
}
