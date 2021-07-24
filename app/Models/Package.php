<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    public function details(){
        return $this->hasMany(PackageDetails::class,'package_id');
    }
}
