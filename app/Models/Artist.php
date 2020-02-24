<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $fillable = [
        'name',
        'description',
        'img_url',
    ];

    protected $table = 'artists';

    /**
     * アーティストのミュージックを取得
     */
    public function musics()
    {
        return $this->hasMany('App\Models\Music');
    }

}
