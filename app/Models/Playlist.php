<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $fillable = [
        'user_id',
        'name',
    ];

    protected $table = 'playlists';

    /**
     * このプレイリストを所有するユーザー情報を取得
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * プレイリストの曲一覧
     */
    public function musics()
    {
        return $this->belongsToMany('App\Models\Music','playlist_musics')->withPivot('order');
    }
}
