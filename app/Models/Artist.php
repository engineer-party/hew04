<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $fillable = [
        'genre_id',
        'name',
        'description',
    ];

    protected $table = 'artists';

    /**
     * アーティストのミュージックを取得
     */
    public function musics()
    {
        return $this->hasMany('App\Models\Music');
    }

    /**
     * このアーティストが所属するジャンルを取得
     */
    public function genre()
    {
        return $this->belongsTo('App\Models\Genre');
    }
}
