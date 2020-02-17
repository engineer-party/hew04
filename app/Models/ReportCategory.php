<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportCategory extends Model
{
    /**
     * このカテゴリーの通報を取得
     */
    public function reports()
    {
        return $this->hasMany('App\Models\Report');
    }
}
