<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJob;
use App\Models\Jop;
use App\User;
use Illuminate\Http\Request;

class JobsClient extends Controller
{
    public function index(){
        $jobs = Jop::all();
        return view('Admin.jobs.index',compact('jobs'));
    }

    public function create(StoreJob $request){
        try {
            Jop::create([
               'title' => $request->job_title
            ]);
            return back()->with(notification('تم اضافة وظيفة جديدة','success'));
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
        }
    }

    public function update(StoreJob $request){
        try {
            $job = Jop::findOrFail($request->id);
            $job->update([
                'title'    => $request->job_title,
            ]);
            return back()->with(notification('تم تحديث الوظيفة بنجاح','info'));
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
        }
    }



    public function delete_one(request $request){
        $attachedFamous = User::where('job_id',$request->id)->pluck('job_id');
        if($attachedFamous->count() == 0) {
            Jop::findOrFail($request->id)->delete();
            return back()->with(notification('تم حذف الوظيفة بنجاح','warning'));
        }
        else{
            return back()->with(notification('لا يمكن حذف الوظيفة بسبب وجود مشهورين مسجلين بها','error'));
        }
    }



}
