<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampaignTable extends Model
{
    /**
     * campaignの曲
     */
    public function music()
    {
        return $this->hasOne('App\Music');
    }
}
