<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Category;
use App\Models\User;

use DB;
class MyprofileController extends Controller
{
    public function show(){
        $idkh = session()->get('idkh');
        $user = User::where('id','=',$idkh)->first();
        $items = session()->get('cart');
        return view('user/myprofile',['items'=>$items,'user'=>$user]);
    }
    public function edit(Request $req){
        $model = User::find($req->id);
        $model->CustomerName = $req->name;      
        $model->Address = $req->address;
        $model->Phone = $req->phonenumber;
        $model->email = $req->email;
        $model->save();
        return redirect()->back();
    }
}
