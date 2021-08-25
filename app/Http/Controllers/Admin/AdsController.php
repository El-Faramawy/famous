<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    public function index(){
        $ads=Ads::where('status' , 'accepted')->get();
        $refused_ads=Ads::where('status' , 'refused')->get();
        return view('Admin/Ads/all',compact('ads' , 'refused_ads'));

    }



}
