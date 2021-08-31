<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class PreviousAds extends Model
{
    protected $guarded = [];
    public function famous(){
        return $this->belongsTo(User::class,'famous_id');
    }
}
