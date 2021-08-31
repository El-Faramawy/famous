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
        return back()->with(notification('تم حذف المشترك بنجاح','warning'));
    }

    public function delete_all(): \Illuminate\Http\RedirectResponse
    {
        Offers::truncate();
        return back()->with(notification('تم حذف جميع المشتركين بنجاح','warning'));
    }
}
