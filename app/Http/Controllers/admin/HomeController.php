<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;


class HomeController extends Controller
{   
    public function index(){
    if(session('islogin') == 1){
        $user = Auth::guard('admin')->user();
    //    echo 'Xin chào Admin, '. $user->name;
        return view('admin/home');
        }
        else return  view('Admin/Auth/Login');
    }
}
