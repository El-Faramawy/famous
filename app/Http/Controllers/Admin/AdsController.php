<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use App\Models\PreviousAds;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    public function index(){
        $ads = Ads::all();
        return view('Admin/ads/all',compact('ads'));
    }
    public function previous(){
        $Prev_ads =PreviousAds::all();
        return view('Admin/ads/previous',compact('Prev_ads'));
    }
}
