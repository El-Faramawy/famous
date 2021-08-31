<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Jop;
use App\Models\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    protected function phone_codes(){
        $phone_codes = [
            '20' => 'مصر (+20)',
            '966' => 'السعودية (+966)',
            '213' => 'الجزائر (+213)',
            '973' => 'البحرين (+973)',
            '98' => 'ايران (+98)',
            '964' => 'العراق (+964)',
            '962' => 'الاردن (+962)',
            '965' => 'الكويت (+965)',
            '961' => 'لبنان (+961)',
            '218' => 'ليبيا (+218)',
            '212' => 'المغرب (+212)',
            '968' => 'عمان (+968)',
            '974' => 'قطر (+974)',
            '252' => 'الصومال (+252)',
            '249' => 'السودان (+249)',
            '963' => 'سوريا (+963)',
            '216' => 'تونس (+216)',
            '971' => 'الامارات (+971)',
            '969' => 'اليمن (شمالا)(+969)',
            '967' => 'اليمن (جنوبا)(+967)',
        ];
        return $phone_codes;
    }
    public function show_register_user(){
        $phone_codes = $this->phone_codes();
        $setting     = Setting::first();
        return view('Site/register-user',compact('setting','phone_codes'));
    }
//    ==============================================================================
    public function show_register_famous(){
        $setting     = Setting::first();
        $jobs        = Jop::all();
        $phone_codes = $this->phone_codes();
        return view('Site/register-famous',compact('setting','jobs','phone_codes'));
    }


//    ==============================================================================
    public function check_phone(Request $request)
    {
        $message = [];
        $validator = Validator::make($request->all(), [ // <---
            'phone' => ['unique:users'],
        ]);
        $validator->fails()? $message[] = 'هذا الهاتف موجود ':'';
        $validator = Validator::make($request->all(), [ // <---
            'phone' => ['required'],
        ]);
        $validator->fails()? $message[] = 'رقم الهاتف مطلوب ':'';
        $validator = Validator::make($request->all(), [ // <---
            'phone_code' => ['required'],
        ]);
        $validator->fails()? $message[] = 'كود الهاتف مطلوب ':'';
        $validator = Validator::make($request->all(), [ // <---
            'image' => ['required'],
        ]);
        $validator->fails()? $message[] = 'الصورة مطلوبة ':'';

        if ($request->type == 'famous'){
            $validator = Validator::make($request->all(), [ // <---
                'name' => ['required'],
            ]);
            $validator->fails()? $message[] = 'الاسم مطلوب ':'';
            $validator = Validator::make($request->all(), [ // <---
                'job_id' => ['required'],
            ]);
            $validator->fails()? $message[] = 'التصنيف مطلوب ':'';
        }else{
            $validator = Validator::make($request->all(), [ // <---
                'company_name' => ['required'],
            ]);
            $validator->fails()? $message[] = 'اسم الشركة مطلوب ':'';
            $validator = Validator::make($request->all(), [ // <---
                'company_person' => ['required'],
            ]);
            $validator->fails()? $message[] = 'الشخص المسئول مطلوب ':'';
            $validator = Validator::make($request->all(), [ // <---
                'company_email' => ['required'],
            ]);
            $validator->fails()? $message[] = 'ايميل الشركة مطلوب ':'';
        }

        if ($message != [])
            return response()->json([ 'message' => $message, 'type' => 'error']);

        else
            return response()->json([ 'type' => 'success']);
    }
//    ==============================================================================
    public function check_phone_login(Request $request)
    {
        $message = [];
        $validator = Validator::make($request->all(), [ // <---
            'phone' => ['required'],
        ]);
        $validator->fails()? $message[] = 'رقم الهاتف مطلوب ':'';
        $validator = Validator::make($request->all(), [ // <---
            'phone_code' => ['required'],
        ]);
        $validator->fails()? $message[] = 'كود الهاتف مطلوب ':'';
        if ($message != [])
            return response()->json([ 'message' => $message, 'type' => 'error']);

        $users = User::all();
        foreach ($users as $user){
            if ($user->phone == $request->phone ) //$user->phone == $request->phone && $user->phone_code == $request->phone_code
                return response()->json(['type' => 'success','id'=>$user->id]);
        }
        $message[]='رقم الهاتف غير موجود';
        return response()->json(['message'=>$message,'type' => 'error']);
    }

//    ==============================================================================
    public function register_user(Request $request){

        $new_user = new User;
        $new_user->name             = $request->name;
        $new_user->phone_code       = $request->phone_code;
        $new_user->phone            = $request->phone ;
        $new_user->type             = $request->type;
        $new_user->job_id           = $request->job_id ;
        $new_user->facebook         = $request->facebook;
        $new_user->instagram        = $request->instagram;
        $new_user->twitter          = $request->twitter;
        $new_user->youtube          = $request->youtube;
        $new_user->snapchat         = $request->snapchat;
        $new_user->id_num           = $request->id_num;
        $new_user->tax_num          = $request->tax_num;
        $new_user->trade_num        = $request->trade_num;
        $new_user->company_name     = $request->company_name;
        $new_user->company_person   = $request->company_person;
        $new_user->company_email    = $request->company_email ;
        if (isset($request->image))
            $new_user->image  = upload_image('client','image');
        $new_user->save();
        Auth::login($new_user);

        $id = $new_user->id;
        $url = $new_user->type=='famous'?url('profile',$id):url('/');
        return response()->json(['message'=>'تم الحفظ', 'type' => 'success','url'=>$url]);
    }

//=====================================================================================================
    public function login(Request $request)
    {
        $setting     = Setting::first();
        $phone_codes = $this->phone_codes();
        return view('Site/login',compact('setting','phone_codes'));
    }
//=====================================================================================================
    public function logout()
    {
        Auth::logout();
        return redirect('login')->with(notification('تم تسجيل الخروج','info'));
    }
//=====================================================================================================
    public function post_login(Request $request)
    {
        $user = User::where('id',$request->id)->first();
        Auth::login($user);
        $url = $user->type=='famous'?url('profile',$user->id):url('/');
        return response()->json(['type' => 'success','url'=>$url]);
    }
//    //=====================================================================================================
//    public function code($id){
//        $phone = User::where('id',$id)->first();
//        return view('Site/code',['phone'=>$phone]);
//    }
//    //=====================================================================================================
//    public function confirm_code($id){
//        $user = User::where('id',$id)->first();
//        Auth::login($user);
//        return redirect('profile');
//    }



}
