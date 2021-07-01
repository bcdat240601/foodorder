<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
    public function login(Request $request)
    {
        if ($request->getMethod() == 'GET') {
           return view('Web/Login');
        }
        $credentials = $request->only(['email', 'password']);
        $o = User::where('email','=',$request->email)->first();
        session()->put('login',1);
        echo $request->Password;
        if (Auth::attempt($credentials)) {
            $o = User::where('email','=',$request->email)->first();
            $idkh = $o->id;
            session()->put('idkh',$idkh);
            session()->put('login',1);
            return redirect()->route('home');
        } else {
            echo'sai password';
            //return redirect()->back()->withInput();
        }
    }
    public function logout(){
        Auth::logout();
        session()->put('login',0);
        return redirect('/home');
    }
}
