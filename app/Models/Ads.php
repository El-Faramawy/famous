<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    protected $guarded = [];

    public function images(){
        return $this->hasMany(AdImage::class,'ad_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function package(){
        return $this->belongsTo(Package::class,'package_id');
    }


}
