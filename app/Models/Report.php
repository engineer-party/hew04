<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    /**
     * この通報のカテゴリーを取得
     */
    public function category()
    {
        return $this->belongsTo('App\Models\ReportCategory','category_id');
    }

    /**
     * この通報の送信者情報を取得
     */
    public function sender()
    {
        return $this->belongsTo('App\Models\User','sender_id');
    }

    /**
     * この通報の対象情報を取得
     */
    public function target()
    {
        return $this->belongsTo('App\Models\User','target_id');
    }
}
