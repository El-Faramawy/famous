<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSlider;
use App\Models\Slider;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    use PhotoTrait;

    public function index(){
        $sliders = Slider::all();
        return view('Admin/slider/all',compact('sliders'));
    }

    public function create(StoreSlider $request): \Illuminate\Http\RedirectResponse
    {
        try{
            $file_name = $this->saveImage($request->image,'uploads/slider');
            Slider::create([
                'image'    => $file_name,
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

    public function update(StoreSlider $request): \Illuminate\Http\RedirectResponse
    {
        try{
            $Slider = Slider::findOrFail($request->id);

            // check if the images are changed
            if ($request->has('image')) {
                $file_name = $this->saveImage($request->image, 'uploads/slider');
                $Slider->update([
                    'image' => $file_name,
                ]);
            }

            // update
            $Slider->update([
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
        Slider::findOrFail($request->id)->delete();
        toastr()->success('تم حذف المعرض بنجاح');
        return back();
    }


    public function delete_all(): \Illuminate\Http\RedirectResponse
    {
        Slider::truncate();
        toastr()->success('تم حذف كل بيانات المعرض بنجاح');
        return back();
    }
}
