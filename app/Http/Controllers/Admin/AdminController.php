<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function get(){
        $get=Admin::all();
        return view('Admin/Admin/index',['data'=>$get,'i'=>1]);
    }//end fun
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store_admin(Request $request){
        $valedator =Validator::make($request->all(),[
            'email'=> [ 'unique:admins'],
        ]);
        if ($valedator->fails()) {
            return back()->with(notification('هذا البريد الالكترونى موجود مسبقا','error'));
        }
        $new=new Admin();
        $new->email=$request->email;
        $new->password=Hash::make($request->password);
        $new->phone=$request->phone;
        $new->name=$request->name;
        $new->image = upload_image('admin','image');
        $new->save();
        return redirect('admin/show-admins')->with(notification('تم الحفظ','success'));
    }//end fun
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function admin_delete(Request $request){
        $get=Admin::where('id',$request->id)->get();
        foreach ($get as $delete_){
            delete_file($delete_->image);
        }
        $delete=Admin::find($request->id)->delete();
        return redirect('admin/show-admins')->with(notification('تم الحذف','warning'));
    }//end fun
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function admin_edit(Request $request){
        $get=Admin::where('id',$request->id)->get();
        return view('Admin/Admin/edit',['data'=>$get]);
    }//end fun
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store_admin_update(Request $request){
        $update=Admin::find($request->id);
        $email=Admin::where('id',$request->id)->get();
        foreach ($email as $back){

            if ($back->email != $request->email){
                $valedator =Validator::make($request->all(),[
                    'email'=> [ 'unique:admins'],
                ]);
                if ($valedator->fails()) {
                    return redirect('admin/show-admins')->with(notification('هذا البريد الالكترونى موجود مسبقا','error'));
                }
            }
            if (isset($request->password)){
                $update->password=Hash::make($request->password);
            }
            if (isset($request->image)){
            $update->image = upload_image('admin','image',$back->image);
            }
        }
        $update->name=$request->name;
        $update->email=$request->email;
        $update->phone=$request->phone;
        $update->save();
        return redirect('admin/show-admins')->with(notification('تم التعديل','info'));
    }//end fun
    public function admin_check_delete(Request $request){
        $ids = explode(",", $request->id);
        $get=Admin::whereIn('id', $ids)->get();
        foreach ($get as $delete_){
            if ($delete_->image!=null){
                delete_file($delete_->image);
            }
        }
        $delete_=Admin::whereIn('id', $ids)->delete();
        return redirect('admin/show-admins')->with(notification('تم الحذف','warning'));
    }

    public function save_profile(Request $request){
        if (admin()->user()->email != $request->email){
            $valedator =Validator::make($request->all(),[
                'email'=> [ 'unique:admins'],
            ]);
            if ($valedator->fails()) {
                return back()->with(notification('هذا البريد الإلكترونى موجود مسبقا','warning'));
            }
        }
        $update=Admin::find(admin()->user()->id);
        $update->name=$request->name;
        $update->email=$request->email;
        $update->phone=$request->phone;
        if (isset($request->password)){
            $update->password=Hash::make($request->password);
        }
        if (isset($request->image)){
            $update->image = upload_image('admin','image',admin()->user()->image);
        }
        $update->save();
        return back()->with(notification('تم التعديل','info'));
    }//end fun

    public function my_profile(){
        return view('Admin/profile/index');
    }//end fun
}
