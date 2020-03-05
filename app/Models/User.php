<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements \Illuminate\Contracts\Auth\Authenticatable
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'point',
        'img_url',
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
        return $this->belongsToMany('App\Models\Music','buy_musics')
            ->withPivot('price AS buy_price','point','created_at','updated_at');
    }

    /**
     * userへのお知らせを取得
     */
    public function informations()
    {
        return $this->belongsToMany('App\Models\Information','user_informations');
    }

    /**
     * ユーザーの送信した通報を取得
     */
    public function sendReports()
    {
        return $this->hasMany('App\Models\Report','sender_id');
    }

    /**
     * ユーザーに投稿された通報を取得
     */
    public function targetReports()
    {
        return $this->hasMany('App\Models\Report','target_id');
    }
}
