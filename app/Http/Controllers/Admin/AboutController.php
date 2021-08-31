<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSlider;
use App\Models\About;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    use PhotoTrait;
    public function index(){
        $abouts = About::all();
        return view('Admin.about.about',compact('abouts'));
    }

    public function create(StoreSlider $request): \Illuminate\Http\RedirectResponse
    {
        try{
            $file_name = $this->saveImage($request->image,'uploads/about');
            About::create([
                'image'    => 'uploads/about/'.$file_name,
                'title'    => $request->slider_title,
                'content'  => $request->slider_content,
                'btn_name' => $request->slider_btn,
                'btn_link' => $request->slider_btn_link,
            ]);
            toastr()->success('تم الاضافة بنجاح');
            return back();
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
        }
    }

    public function update(StoreSlider $request)
    {
        try{
            $About = About::findOrFail($request->id);

            // check if the images are changed
            if ($request->has('image')){
                $file_name = $this->saveImage($request->image, 'uploads/about');
                $About->update([
                    'image' => 'uploads/about/'.$file_name,
                ]);
            }

            // update
            $About->update([
                'title'    => $request->slider_title,
                'content'  => $request->slider_content,
                'btn_name' => $request->slider_btn,
                'btn_link' => $request->slider_btn_link,
            ]);
            toastr()->success('تم التحديث بنجاح');
            return back();
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
        }
    }



    public function delete_one(request $request): \Illuminate\Http\RedirectResponse
    {
        About::findOrFail($request->id)->delete();
        toastr()->success('تم الحذف بنجاح');
        return back();
    }

    public function delete_all(): \Illuminate\Http\RedirectResponse
    {
        About::truncate();
        toastr()->success('تم حذف كل البيانات بنجاح');
        return back();
    }

}
