<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index(){
        $info = Setting::first();
        return view('Admin.info.info',compact('info'));
    }
    public function update(request $request){
        try {
            $info = Setting::first();
            $info->update([
                'phone' => $request->phone,
                'email' => $request->email,
                'facebook' => $request->facebook,
                'whatsapp' => $request->whatsapp,
                'twitter' => $request->twitter,
                'youtube' => $request->youtube,
                'gmail' => $request->gmail,
            ]);
            toastr()->success('تم تحديث البيانات بنجاح');
            return back();
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
        }
    }
}
