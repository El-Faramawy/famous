<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class AllfamousContrroller extends Controller
{
    public function index(){

        $vip_famous=user::all()->where('is_favorite', 'yes')->take(8);
        $famous_counter_accepted=user::all()->where('status', 'accepted')->count();
        $famous_counter_all=user::all()->count();
        $all_famous=user::orderBy('created_at', 'DESC')->get()->where('status', 'accepted');
        return view('site.all-famous' , compact('vip_famous' ,'all_famous','famous_counter_accepted', 'famous_counter_all'));

    }





}
