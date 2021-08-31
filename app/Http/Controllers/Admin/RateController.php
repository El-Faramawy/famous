<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\Http\Request;

class RateController extends Controller
{
    public function index(){
        $rates = Rating::all();
        return view('Admin/rate/index',compact('rates'));
    }

    public function delete(request $request){
        Rating::where('id',$request->id)->delete();
        toastr()->success('تم حذف التقييم بنجاح');
        return back();
    }
}
