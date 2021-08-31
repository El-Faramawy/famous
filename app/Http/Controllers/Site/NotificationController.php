<?php

namespace App\Http\Controllers\Site;
//
use App\Http\Controllers\Controller;
use App\Models\notification;
use App\Models\Visitor;
use App\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(){
        $visitor_count = Visitor::where('famous_id', auth()->user()->id)->count();

        $user = User::where('id', auth()->user()->id)->first();

        $notifications = notification::where('famous_id', auth()->user()->id)->get();
        $notifications_client = notification::where('client_id', auth()->user()->id)->get();
//        return $notifications->famous;
        return view('Site/profile-Notifications', compact('notifications' ,'notifications_client', 'user','visitor_count'));
    }


    public function delete_notification(request $request)
    {
        notification::findOrFail($request->id)->delete();
        toastr()->success('تم حذف التعليق بنجاح');
        return back();
    }
}
