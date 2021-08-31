<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Counter;
use App\Models\Offers;
use App\Models\Slider;
use App\User;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $show_sliders=Slider::all();
        $vip_famouses=User::where([['type' , 'famous'] , ['is_favorite' , 'yes'] ,[ 'status' ,'accepted']])->get();
        $show_abouts=About::all()->first();
        $show_abouts2=Slider::all()->last();
        $show_counters=Counter::inRandomOrder()->limit(4)->get();
        $searched_famous=User::where([['type' , 'famous']  ,[ 'status' ,'accepted']])->get();
//        return $show_abouts;
        return view('Site.index', compact('show_sliders','searched_famous','show_abouts','show_counters','show_abouts2','vip_famouses'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $offers=new Offers();
        $offers->email=$request->email;
        $offers->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }





}

