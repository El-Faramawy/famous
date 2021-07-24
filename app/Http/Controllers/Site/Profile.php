<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class Profile extends Controller
{
    public function index(Request $request , $id){
        $user = User::with('job')->where('id',$id)->first();
//        return $user;
        return view('Site/profile',['user'=>$user]);
    }
}
