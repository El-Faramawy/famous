<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        $clients = User::where('type','client')->get();
        return view('Admin.clients.index',compact('clients'));
    }

    //  Delete a client
    public function delete_one(request $request): \Illuminate\Http\RedirectResponse
    {
        User::where([['type','client'],['id',$request->id]])->delete();
        toastr()->success('تم حذف العميل بنجاح');
        return back();
    }

    //  Delete all clients
    public function delete_all(){
        User::where('type','client')->delete();
        toastr()->success('تم حذف جميع العملاء بنجاح');
        return back();
    }
}
