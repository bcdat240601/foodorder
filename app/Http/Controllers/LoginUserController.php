<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

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
            $o = User::where('email','=',$request->email)->first();
            $idkh = $o->id;
            session()->put('idkh',$idkh);
            $namekh = $o->CustomerName;
            session()->put('namekh',$namekh);
            return redirect()->route('home');
        } else {
            $category = Category::where([['id','>',1],['id','<',9]])->get();
            $check = 1;
            return view('Web/Login',['check'=>$check,'category'=>$category]);
            //return redirect()->back()->withInput();
        }
    }
    public function logout(){
        Auth::logout();
        session()->put('login',0);
        session()->forget('idkh');
        session()->forget('namekh');
        return redirect('/home');
    }
}
