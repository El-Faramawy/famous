<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Jop extends Model
{
    protected $guarded = [];

    public function famous(){
        return $this->hasMany(User::class,'job_id');
    }
}
