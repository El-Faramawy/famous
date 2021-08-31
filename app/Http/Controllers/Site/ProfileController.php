<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\AdImage;
use App\Models\Ads;
use App\Models\Jop;
use App\Models\notification;
use App\Models\Package;
use App\Models\PackageDetails;
use App\Models\Visitor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index(Request $request,$id){
//        return $request->ip();
        $count = Visitor::where(['ip'=> $_SERVER['REMOTE_ADDR'],'famous_id'=>$id])->count();
        if ($count == 0){
            if (auth()->check()){
                if (auth()->user()->id!=$id){
                    $visitor = new Visitor;
                    $visitor->ip        =  $_SERVER['REMOTE_ADDR'];
                    $visitor->famous_id = $id;
                    $visitor->save();
                }
            }else{
                $visitor = new Visitor;
                $visitor->ip        =  $_SERVER['REMOTE_ADDR'];
                $visitor->famous_id = $id;
                $visitor->save();
            }
        }

        $visitor_count = Visitor::where('famous_id',$id)->count();
        $user = User::with('job')->where('id',$id)->first();
//        return $user;
        $adses = Ads::with('package.famous')->where('user_id' , $user->id)->orderBy('id','DESC')->get();
//        return $adses;
        return view('Site/profile',['user'=>$user,'visitor_count'=>$visitor_count,'adses'=>$adses]);
    }
    //==========================================================================================
    public function edit_cv(Request $request){
        $user = User::where('id',$request->id)->first();
        $user->cv = $request->cv;
        $user->save();
        return redirect()->back()->with(notification('تم التعديل','info'));
    }
    //==========================================================================================
    public function store_package(Request $request){
        $package = new Package;
        $package->name      = $request->name;
        $package->price     = $request->price;
        $package->famous_id = $request->famous_id;
        $package->save();
        foreach ($request->title as $title){
            $details = new PackageDetails;
            $details->package_id    = $package->id;
            $details->title         = $title;
            $details->save();
        }
        return redirect()->back()->with(notification('تم الحفظ','success'));
    }
    //==========================================================================================
//    public function storeData(Request $request)
//    {
//        try {
//            $user = new User;
//            $user->name = $request->name;
//            $user->email = $request->email;
//            $user->save();
//            $user_id = $user->id; // this give us the last inserted record id
//        }
//        catch (\Exception $e) {
//            return response()->json(['status'=>'exception', 'msg'=>$e->getMessage()]);
//        }
//        return response()->json(['status'=>"success", 'user_id'=>$user_id]);
//    }
    //==========================================================================================
    public function store_ad(Request $request){
//       return $request;
        $ad = new Ads;
        $ad->title      = $request->title;
        $ad->user_id    = $request->user_id;
        $ad->package_id = $request->package_id;
        $ad->save();
        if (isset($request->image)){
            foreach ($request->image as $image){
                $ad_image = new AdImage;
                $ad_image->ad_id    = $ad->id;
//                $ad_image->image    = upload_image('ad','image');
                $ad_image->image    = 'storage/'.$image->store('ad','public');
                $ad_image->save();
            }
        }

        $notification = new notification();
        $notification -> message =   '  تم تقديم طلب للاعلان تابعة للباقة ' . '('. $request->package_name  . ')' ;
        $notification -> famous_id = $request->famous_id;
        $notification -> created_at = now();
        $notification ->save();

//        return $ad;
        return redirect()->back()->with(notification('تم الحفظ','success'));
    }

    //============================================================================
    public function delete_package(Request $request){
        Package::where('id',$request->id)->delete();
        return redirect()->back();
    }
    //============================================================================
    public function profile_edit()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $visitor_count = Visitor::where('famous_id', auth()->user()->id)->count();
        $jobs = Jop::all();
        if (auth()->user()->type == 'famous')
            return view('Site/profile-edit', compact('user', 'visitor_count', 'jobs'));
        else
            return view('Site/profile-client-edit', compact('user', 'visitor_count', 'jobs'));
    }
    //============================================================================
    public function edit_profile(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        $message = [];
//        $validator = Validator::make($request->all(), [ // <---
//            'phone' => ['required'],
//        ]);
//        $validator->fails() ? $message[] = 'رقم الهاتف مطلوب ' : '';
        if ($request->image) {
            $validator = Validator::make($request->all(), [ // <---
                'image' => ['required'],
            ]);
            $validator->fails() ? $message[] = 'الصورة مطلوبة ' : '';
        }

        if ($user->type == 'famous') {
            $validator = Validator::make($request->all(), [ // <---
                'name' => ['required'],
            ]);
            $validator->fails() ? $message[] = 'الاسم مطلوب ' : '';
            $validator = Validator::make($request->all(), [ // <---
                'job_id' => ['required'],
            ]);
            $validator->fails() ? $message[] = 'التصنيف مطلوب ' : '';
        } else {
            $validator = Validator::make($request->all(), [ // <---
                'company_name' => ['required'],
            ]);
            $validator->fails() ? $message[] = 'اسم الشركة مطلوب ' : '';
            $validator = Validator::make($request->all(), [ // <---
                'company_person' => ['required'],
            ]);
            $validator->fails() ? $message[] = 'الشخص المسئول مطلوب ' : '';
            $validator = Validator::make($request->all(), [ // <---
                'company_email' => ['required'],
            ]);
            $validator->fails() ? $message[] = 'ايميل الشركة مطلوب ' : '';
        }
//        if ($user->phone != $request->phone) {
//            $validator = Validator::make($request->all(), [ // <---
//                'phone' => ['unique:users'],
//            ]);
//            $validator->fails() ? $message[] = ' رقم الهاتف موجود مسبقا ' : '';
//        }
        if ($message != []) {
            return response()->json(['message' => $message, 'type' => 'error']);
        }

//        if ($user->phone != $request->phone) {
//            return response()->json([ 'type' => 'phone_changed','phone'=>'+'.$request->phone_code.$request->phone]);
//        }
            $data = $request->all();
        if (isset($request->image) && $request->image != '')
            $data['image'] = upload_image('client', 'image',$data['image'] );
        $user->update($data);
        return response()->json(['type' => 'success']);
    }

}
