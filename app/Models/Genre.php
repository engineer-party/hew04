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
     * ジャンルのアーティストを取得
     */
    public function artists()
    {
        return $this->hasMany('App\Models\Artist');
    }
}
