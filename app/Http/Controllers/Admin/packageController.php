<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class packageController extends Controller
{
    public function index(){

        $packages=Package::all();
        return view('Admin/packages/all',compact('packages'));

    }

}
