<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\PreviousAds;
use App\Models\Visitor;
use App\Traits\PhotoTrait;
use App\User;
use Illuminate\Http\Request;

class PreviousAdsController extends Controller
{
    use PhotoTrait;
//    public function index(){
//        $user          = User::where('id',auth()->user()->id)->first();
//        $visitor_count = Visitor::where('famous_id',auth()->user()->id)->count();
//        return view('Site/profile-PreviousAds',compact('user','visitor_count'));
//    }

    public function clientAds($id){
        $user          = User::where('id',$id)->first();
        $visitor_count = Visitor::where('famous_id',$id)->count();
        return view('Site/profile-PreviousAds',compact('user','visitor_count'));
    }

    function getYoutubeEmbedUrl($url)
    {
        $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
        $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

        if (preg_match($longUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }

        if (preg_match($shortUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }
        return 'https://www.youtube.com/embed/' . $youtube_id ;
    }

    public function create(request $request){
        $ad = new PreviousAds();
        $ad->name      = $request->name;
        $ad->date      = $request->date;
        $ad->famous_id = auth()->user()->id;
        if ($request->link != null){
            $ad->link = $this->getYoutubeEmbedUrl($request->link);
        }
        else{
            $file_name = $this->saveImage($request->video,'uploads/previous_ads');
            $ad->video = 'uploads/previous_ads/'.$file_name;
        }
        $ad->save();
        return back()->with(notification('تم نشر الاعلان','success'));
    }

    public function delete(Request $request){
        PreviousAds::where('id',$request->id)->delete();
        return redirect()->back();
    }
}
