<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class notification extends Model
{
    protected $guarded = [];
    protected $table = 'notification';
    public $timestamps = false;
    public function user(){
        return $this->belongsTo(User::class, 'client_id');    }

public function famous(){
        return $this->belongsTo(User::class, 'famous_id');    }

}
