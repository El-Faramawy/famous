<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Jop;
use App\User;
use Illuminate\Http\Request;

class AllfamousContrroller extends Controller
{
    public function index(Request $request){

        $vip_famous=user::where([['type' , 'famous'] , ['is_favorite' , 'yes'] ,[ 'status' ,'accepted']])->get();
        $famous=user::where(['status'=>'accepted','type'=>'famous'])->orderBy('date', 'DESC')->get();
        $all_famous_count=user::where(['status'=>'accepted','type'=>'famous'])->count();
        $jobs = Jop::whereHas('famous')->get();
        if ($request->ajax()) {
            $job_data = $request->job? preg_split("/[,]/", $request->job):null;

            $job = Jop::pluck('id')->toArray();
            if (is_array($job_data) && !in_array('all', $job_data) ) {
                $job = Jop::whereIn('id', $job_data)->pluck('id')->toArray();
            } else {
                $job = Jop::pluck('id')->toArray();
            }
            $order = $request->order == 'rate'?'rate':'date';
            $search = $request->search;
            if ($search == null){
                $famous=user::whereIn('job_id',$job)
                    ->where(['status'=>'accepted','type'=>'famous'])
                    ->orderBy($order, 'DESC')->get();
            }else{
                $famous=user::whereIn('job_id',$job)
                    ->where(['status'=>'accepted','type'=>'famous',['name','like','%'.$search.'%']])
                    ->orderBy($order, 'DESC')->get();
            }
            $html = view('Site.parts.famous_search' , compact('vip_famous' ,'famous','all_famous_count','jobs'))->render();
            return response()->json(['html'=>$html,'type'=>'success']);
        }
//        $all_famous=user::orderBy('created_at', 'DESC')->where([['type' , 'famous'] ,[ 'status' ,'accepted']])->get();
        return view('Site.all-famous' , compact('vip_famous' ,'famous','all_famous_count','jobs'));

    }





}
