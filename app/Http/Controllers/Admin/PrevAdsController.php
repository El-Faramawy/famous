<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PreviousAds;
use Illuminate\Http\Request;

class PrevAdsController extends Controller
{
    public function index(){
        $Prev_ads=PreviousAds::all();
        return view('Admin/previous_ads/all',compact('Prev_ads'));

    }
}
