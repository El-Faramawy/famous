<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Counter;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    public function index(){
        $counters = Counter::all();
        return view('Admin/counter/all',compact('counters' ));
    }


    public function add(){
        return view('Admin/counter/add');
    }


public function create( \App\Http\Requests\Counter $request){
    try {
        $counter=new Counter();
        $counter->title  =$request->get('title');
        $counter->number =$request->get('number');
        $counter->icon   =$request->get('icon');
        $counter->save();
        return redirect('admin/counter')->with(notification('تم اضافة عداد جديد','success'));
    }
    catch (\Exception $e){
        return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
    }
}

    public function update(\App\Http\Requests\Counter $request)

    {
        try {
            $update_counter=counter::find($request->id);
            $update_counter->title=$request->get('title');
            $update_counter->number=$request->get('number');
            $update_counter->icon=$request->get('icon');
            $update_counter->save();
            return back()->with(notification('تم تعديل البيانات بنجاح','success'));
        }
        catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function delete_one(request $request): \Illuminate\Http\RedirectResponse
    {
        Counter::findOrFail($request->id)->delete();
        return back()->with(notification('تم حذف العداد بنجاح','warning'));
    }

    public function delete_all(): \Illuminate\Http\RedirectResponse
    {
        Counter::truncate();
        return back()->with(notification('تم الحذف كل العدادات بنجاح','warning'));

    }
}
