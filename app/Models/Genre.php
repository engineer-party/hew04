<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = [
        'name',
    ];

    protected $table = 'genres';

    /**
     * このジャンルの曲を取得
     */
    public function Musics()
    {
        return $this->belongsToMany('App\Models\Music','genre_music');
    }
}
