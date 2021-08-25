<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    public function images(){
        return $this->hasMany(Ads::class,'ad_id');
    }
}
