<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\offer;
use App\Models\Counter;
use App\Models\Offers;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index(){
        $offers = Offers::all();
        return view('Admin/offer/all',compact('offers'));
    }


    public function delete_one(request $request): \Illuminate\Http\RedirectResponse
    {
        Offers::findOrFail($request->id)->delete();
        toastr()->success('تم حذف العروض بنجاح');
        return back();
    }

    public function delete_all(): \Illuminate\Http\RedirectResponse
    {
        Offers::truncate();
        toastr()->success('تم حذف كل العروض بنجاح');
        return back();
    }
}
