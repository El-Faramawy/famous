<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\User;
use Illuminate\Http\Request;

class FamousController extends Controller
{
    // get all famous
    public function index(){
        $famous_list = User::where('type','famous')->get();
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
            $VIPFamous = User::findOrFail( $request->id);
            $VIPFamous->update([
                'is_favorite' => 'no'
            ]);
            toastr()->success('تم الغاء عضوية VIP لهذا المشهور بنجاح');
            return back();
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
        }
    }


    // change VIP famous and Status of a famous
    public function update(request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            // get the famous
            $famous = User::findOrFail( $request->id);
            if($request->has('VIP')){
                $famous->update([
                    'is_favorite' => 'yes',
                    'status' => $request->status,
                ]);
            }
            else{
                $famous->update([
                    'is_favorite' => 'no',
                    'status' => $request->status,
                ]);
            }
            toastr()->success('تم تحديث بيانات المشهور بنجاح');
            return back();
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
                toastr()->success('تم الغاء عضوية VIP لكل المشاهير بنجاح');
                return back();
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
            $new = User::findOrFail($request->id);
            $new->update([
                'status' => 'accepted'
            ]);
            toastr()->success('تم الموافقة علي المشهور بنجاح');
            return back();
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
                ]);
                toastr()->success('تم الموافقة علي كل المشاهير المعلقين');
                return back();
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
            Package::where('id', $request->pack)->delete();
            toastr()->success('تم حذف الباقة بنجاح');
            return back();
        }
        else {
            toastr()->error('يرجي اختيار باقة !');
            return back();
        }

    }

    //  Delete a famous
    public function delete_one(request $request): \Illuminate\Http\RedirectResponse
    {
        User::where([['type','famous'],['id',$request->id]])->delete();
        toastr()->success('تم حذف المشهور بنجاح');
        return back();
    }

    // Delete all famous
    public function delete_all(): \Illuminate\Http\RedirectResponse
    {
        User::where('type','famous')->delete();
        toastr()->success('تم حذف جميع المشاهير بنجاح');
        return back();
    }
}
