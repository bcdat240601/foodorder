<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{
    public function login(Request $request)
    {
        if ($request->getMethod() == 'GET') {
            return view('Admin/Auth/Login');
        }
        $credentials = $request->only(['email','password']);
        if (Auth::guard('admin')->attempt($credentials)) {
            session()->put('islogin',1);
            return redirect()->route('dashboard');
        } else {
            $message = 'tài khoản  không hợp lệ';
            return view('Admin/Auth/Login',['message'=>$message]);
        }
    }
}