<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $fillable = [
        'artist_id',
        'genre_id',
        'name',
        'time',
        'price',
        'img_url',
        'music_url',
        'sample_url',
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
    public function buyUsers()
    {
        return $this->belongsToMany('App\Models\User','buy_musics')
            ->withPivot('price AS buy_price','point AS buy_point','created_at','updated_at');
    }

    /**
     * 曲のジャンルを取得
     */
    public function genres()
    {
        return $this->belongsToMany('App\Models\Genre','genre_music');
    }

    /**
     * 曲のcampaign情報
     */
    public function campaign()
    {
        return $this->hasOne('App\Campaign');
    }

    /**
     * 曲のplaylist
     */
    public function playlists()
    {
        return $this->belongsToMany('App\Models\Playlist','playlist_playlists')->withPivot('order');
    }
}
