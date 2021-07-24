<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public function user(){
        return $this->hasOne(User::class,'user_id');
    }
    public function famous(){
        return $this->hasOne(User::class,'famous_id');
    }
}
