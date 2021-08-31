<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdImage extends Model
{
    protected $table = 'ad_image';
    protected $guarded = [];
    public function images(){
        return $this->belongsTo(AdImage::class,'ad_id');
    }
}
