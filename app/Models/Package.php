<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $guarded = [];
    public function details(){
        return $this->hasMany(PackageDetails::class,'package_id');
    }
    public function famous(){
        return $this->belongsTo(User::class,'famous_id');
    }
}
