<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use SoftDeletes;

    /**
     * この位置情報を所有するユーザー情報を取得
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * この位置情報のプレイリストを取得
     */
    public function playlist()
    {
        return $this->belongsTo('App\Models\Playlist');
    }
}
