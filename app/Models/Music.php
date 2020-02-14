<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $fillable = [
        'artisan_id',
        'genre_id',
        'name',
        'time',
        'price',
        'release_date',
    ];

    protected $table = 'musics';

    /**
     * この曲を歌っているアーティスト情報を取得
     */
    public function artist()
    {
        return $this->belongsTo('App\Models\Artist');
    }

    /**
     * 曲を購入したユーザーを取得
     */
    public function buyMusics()
    {
        return $this->belongsToMany('App\Models\User','buy_musics');
    }
}
