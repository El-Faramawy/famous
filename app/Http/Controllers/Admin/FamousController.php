<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\notification;
use App\Models\Package;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class FamousController extends Controller
{
    // get all famous
    public function index(){
        $famous_list = User::where([['type','famous'],['status','accepted']])
            ->orWhere([['type','famous'],['status','refused']])->get();
        // Get a package of a famous
        $packages = Package::all();
        return view('Admin.famous.all',compact('famous_list','packages'));
    }

    // get VIP famous
    public function VIP(){
        $VIPFamous = User::where([['type','famous'],['is_favorite','yes']])->get();
        return view('Admin.famous.VIP',compact('VIPFamous'));
    }

    // deactivate one famous
    public function deactivate_one_famous(request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $VIPFamous    = User::findOrFail( $request->id);
            $notification = new notification();
            $VIPFamous->update([
                'is_favorite' => 'no'
            ]);
            $notification->famous_id  = $request->id;
            $notification->created_at = Carbon::now();
            $notification->message   = 'تم الغاء عضوية VIP لديك';
            $notification->save();
            return back()->with(notification('تم الغاء عضوية VIP بنجاح','warning'));
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
        }
    }


    // change VIP famous and Status of a famous
    public function update(request $request)
    {
        try {
            // get the famous
            $famous = User::findOrFail( $request->id);
            if($request->has('VIP')){
                ## to prevent
                if ($famous->is_favorite != 'yes'){
                    $notification = new notification();
                    $notification->famous_id  = $request->id;
                    $notification->created_at = Carbon::now();
                    $notification->message    = 'تم تفعيل عضوية VIP لديك';
                    $notification->save();
                }
                $famous->update([
                    'is_favorite' => 'yes',
                ]);
            }
            else{
                if ($famous->is_favorite != 'no') {
                    $notification = new notification();
                    $notification->famous_id = $request->id;
                    $notification->created_at = Carbon::now();
                    $notification->message = 'تم الغاء عضوية VIP لديك';
                    $notification->save();
                }
                $famous->update([
                    'is_favorite' => 'no',
                ]);
            }
            if ($request->has('status')){
                if($request->status == 'accepted'){
                    $famous->update([
                        'status' => $request->status,
                        'date'   => Carbon::now()
                    ]);
                    $notification = new notification();
                    $notification->famous_id = $request->id;
                    $notification->created_at = Carbon::now();
                    $notification->message   = 'تم تنشيط حسابك';
                    $notification->save();
                }else {
                    $famous->update([
                        'status' => $request->status,
                    ]);
                    $notification = new notification();
                    $notification->famous_id = $request->id;
                    $notification->created_at = Carbon::now();
                    $notification->message   = 'تم حظر حسابك ولن يظهر للعملاء';
                    $notification->save();
                }
            }
            return back()->with(notification('تم تحديث بيانات المشهور بنجاح','info'));
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
        }
    }

    // deactivate all famous
    public function deactivate_all_famous(): \Illuminate\Http\RedirectResponse
    {
        try {
            $VIPFamous = User::where([['type', 'famous'], ['is_favorite', 'yes']])->get();
            foreach ($VIPFamous as $VIP) {
                $VIP->update([
                    'is_favorite' => 'no',
                ]);
                return back()->with(notification('تم الغاء عضوية VIP لجميع العملاء بنجاح','warning'));
            }
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    // allow one famous
    public function accept_one_famous(request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $notification = new notification();
            $new = User::findOrFail($request->id);
            $new->update([
                'status' => 'accepted',
                'date'   => Carbon::now()
            ]);
            $notification->famous_id = $request->id;
            $notification->created_at = Carbon::now();
            $notification->message   = 'تم تنشيط حسابك';
            $notification->save();
            return back()->with(notification('تم الموافقة علي المشهور بنجاح','success'));
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
        }
    }

    // allow all famous
    public function allow_all_famous(): \Illuminate\Http\RedirectResponse
    {
        try {
            $newFamous = User::where([['type', 'famous'], ['status', 'new']])->get();
            foreach ($newFamous as $new) {
                $new->update([
                    'status' => 'accepted',
                    'date'   => Carbon::now()
                ]);
                return back()->with(notification('تم الموافقة علي كل المشاهير بنجاح','success'));
            }
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    // get new famous
    public function newFamous(){
        try {
            $newFamous = User::where([['type', 'famous'], ['status', 'new']])->get();
            return view('Admin.famous.new',compact('newFamous'));
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }


    // remove a package
    public function remove_package(request $request){
        if($request->has('pack')) {
            $notification = new notification();
            $package_name = Package::where('id', $request->pack)->first()->name;
            Package::where('id', $request->pack)->delete();
            $notification->famous_id = $request->id;
            $notification->message   = 'تم حذف الباقة التالية '.$package_name;
            $notification->save();
            return back()->with(notification('تم حذف الباقة بنجاح','warning'));
        }
        else {
            return back()->with(notification('يجب تحديد باقة اولا','error'));
        }
    }

    //  Delete a famous
    public function delete_one(request $request): \Illuminate\Http\RedirectResponse
    {
        User::where([['type','famous'],['id',$request->id]])->delete();
        return back()->with(notification('تم حذف المشهور بنجاح','warning'));
    }

    // Delete all famous
    public function delete_all(): \Illuminate\Http\RedirectResponse
    {
        User::where('type','famous')->delete();
        return back()->with(notification('تم حذف جميع المشاهير بنجاح','warning'));
    }
}
