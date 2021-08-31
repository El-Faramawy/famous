<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FooterRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index(){
        $info = Setting::first();
        return view('Admin.info.info',compact('info'));
    }
    public function update(FooterRequest $request){
//        return $request;
        try {
            $info = Setting::first();
            $info->update([
                'phone'    => $request->phone,
                'email'    => $request->email,
                'facebook' => $request->facebook,
                'whatsapp' =>  'https://wa.me/' . $request->phone,
                'twitter'  =>  $request->twitter,
                'youtube'  =>  $request->youtube,
            ]);
            toastr()->success('تم تحديث البيانات بنجاح');
            return back();
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
        }
    }
}
