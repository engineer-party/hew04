<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $fillable = [
        'title',
        'content',
    ];

    protected $table = 'informations';

    /**
     * お知らせしたuserを取得
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User','user_informations');
    }
}
