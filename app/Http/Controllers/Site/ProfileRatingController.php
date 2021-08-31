<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use App\Models\Package;
use App\Models\Rating;
use App\Models\Visitor;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ProfileRatingController extends Controller
{
//    public function index(){
//        $user          = User::where('id',auth()->user()->id)->first();
//        $visitor_count = Visitor::where('famous_id',auth()->user()->id)->count();
//        $rates         = Rating::where('famous_id',auth()->user()->id)->get();
//        return view('Site/profile-rating',compact('user','visitor_count','rates'));
//    }

    public function clientRating($id)
    {
        $user          = User::where('id', $id)->first();
        $visitor_count = Visitor::where('famous_id', $id)->count();
        $rates         = Rating::where('famous_id', $id)->get();
        return view('Site/profile-rating', compact('user', 'visitor_count', 'rates'));
    }

    public function giveRate(request $request)
    {
        try {
            $famous      = User::where('id', $request->famous_id)->first();
            $famous_id   = $famous->id;
            ########################## return ended ADS ##################################
            $ads         = Ads::where([['user_id', $request->user_id],['status','ended']])
                ->with('package.famous')
                ->whereHas('package',function ($query) use ($famous_id){
                    $query->where('famous_id',$famous_id);
                })
                ->get();
            ###############################################################################

            ## check if the order is ended before rating
            if ($ads->count() > 0){
                ## if user already rate the famous before
                if (Rating::where([['famous_id', $request->famous_id], ['user_id', $request->user_id]])->first())
                    return back()->with(notification('تم تقييم هذا المشهور مسبقا', 'error'));

                if(!isset($request->star)){
                    return back()->with(notification('يرجي تحديد تقييم', 'warning'));
                }
                ## insert in Rating table
                $rate = new Rating();
                $rate->comment = $request->comment;
                $rate->rate = $request->star;
                $rate->famous_id = $request->famous_id;
                $rate->user_id = $request->user_id;
                $rate->created_at = Carbon::now();
                $rate->date = $request->created_at;
                $rate->save();


                ## edit the total rate of the famous
                $famous = User::where('id', $request->famous_id)->first();
                $total_rate = 0;
                foreach ($famous->rating as $rates) {
                    $total_rate = $total_rate + $rates->rate;
                }
                ($famous->rating->count() == 0) ? $famous->rate = $request->star : $famous->rate = round($total_rate / $famous->rating->count());
                $famous->save();
                return back();
            } else
                return back()->with(notification('لم ينتهي الاعلان بعد', 'error'));

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }
}

