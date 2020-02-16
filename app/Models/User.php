<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements \Illuminate\Contracts\Auth\Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'point',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $table = 'users';

    /**
     * ユーザーのプレイリストを取得
     */
    public function playlists()
    {
        return $this->hasMany('App\Models\Playlist');
    }

    /**
     * ユーザーのポイント購入履歴を取得
     */
    public function buyPoints()
    {
        return $this->hasMany('App\Models\BuyPoint');
    }

    /**
     * userの購入した曲を取得
     */
    public function musics()
    {
        return $this->belongsToMany('App\Models\Music','buy_musics');
    }

    /**
     * userへのお知らせを取得
     */
    public function informations()
    {
        return $this->belongsToMany('App\Models\Information','user_informations');
    }
}
