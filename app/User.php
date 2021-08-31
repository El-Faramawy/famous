<?php

namespace App;

use App\Models\AdImage;
use App\Models\Ads;
use App\Models\Jop;
use App\Models\Package;
use App\Models\PreviousAds;
use App\Models\Rating;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function job(){
        return $this->belongsTo(Jop::class,'job_id');
    }
    public function ads(){
        return $this->hasMany(Ads::class,'user_id');
    }

    public function package(){
        return $this->hasMany(Package::class,'famous_id');
    }
    public function previos_ads(){
        return $this->hasMany(PreviousAds::class,'famous_id');
    }
    public function rating(){
        return $this->hasMany(Rating::class,'famous_id');
    }

    public function ali(){
    return $this->hasOne(Ads::class, 'user_id');    }

    public function notification(){
    return $this->hasOne(User::class, 'client_id');    }

}
