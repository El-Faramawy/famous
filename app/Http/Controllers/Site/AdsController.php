<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use App\Models\notification;
use App\Models\Visitor;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AdsController extends Controller
{

    public function index()
    {
        $adses = ads::with('package.famous')->get();
        $visitor_count = Visitor::where('famous_id', auth()->user()->id)->count();

        $user = User::where('id', auth()->user()->id)->first();


//return $adses;
        return view('Site/profile-orders', compact('adses', 'user', 'visitor_count'));
    }


    public function accepted_ads(request $request)
    {
//        return $request  ;

        try {
                $status_type= Ads::where([['user_id', $request->client_id],['id' , $request->id]]);


  ################################ check status and send nitification ######################################
            if ($request){
                    if ($request->status == 'accepted') {
                        $status_type->update([
                            'status' => 'accepted'
                        ]);

                        $notification = new notification();
                        $notification -> message = 'تم قبول طلب الاعلان بنجاح'. '(' . $request->name . ')';
                        $notification -> client_id = $request->client_id;
                        $notification -> famous_id = $request->famous_id;
                        $notification -> created_at = now();
                        $notification ->save();
                        return back()->with(notification('تم رفض قبول الاعلان', 'success'));;

                        return back();
                    }
                    if ($request->status == 'refused') {
                    $status_type->update([
                        'status' => 'refused'
                    ]);
                    $notification = new notification();
                    $notification -> message = 'تم رفض طلب الاعلان ' . '(' . $request->name . ')' ;
                    $notification -> client_id = $request->client_id;
                        $notification -> famous_id = $request->famous_id;
                        $notification -> created_at = now();
                    $notification ->save();
                        return back()->with(notification('تم رفض طلب الاعلان', 'error'));;
                }
                    if ($request->status == 'ended') {
                    $status_type->update([
                        'status' => 'ended'
                    ]);
                    $notification = new notification();
                    $notification -> message = 'تم انهاء طلب الاعلان ' . '(' . $request->name . ')';
                    $notification -> client_id = $request->client_id;
                        $notification -> famous_id = $request->famous_id;
                        $notification -> created_at = now();
                    $notification ->save();
                    return back()->with(notification('تم انهاء طلب الاعلان', 'info'));;
                }
            }

        }

        catch (\Exception $e){
            return back()->with(notification('تم رفض العملية الخاصة بك', 'error'));
        }
    }
}
