<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Offers;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
        public function index(){
            $famous = User::where('type','famous')->get()->take(5);
            $accepted_famous = User::where([['type', 'famous'], ['status', 'accepted']])->orderBy('rate', 'DESC')->paginate(3);
            $new = User::where([['type', 'famous'], ['status', 'new']])->get()->take(3);
            $persons = Offers::orderBy('created_at', 'DESC')->paginate(5);
            $famous_count=$new->count();
            return view('Admin/index' , compact('famous','persons','new','famous_count','accepted_famous'));
        }
}
