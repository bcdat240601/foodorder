@extends('layout_web')
@section('content')
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/login.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>

        <main style="background-color:white; min-height: 300px; padding: 7.5px 15px;">
            <div class="container" style="width: 100%; max-width: 1200px; margin-left: auto; margin-right: auto;">
            <div class="login-form" style="width: 100%; max-width: 500px; margin: 30px auto;  background-color: #ffffff; padding: 20px; border: 3px dotted #cccccc; border-radius: 10px;">
                <form method="POST" action="{{ asset('login') }}">
                    @csrf
                    <h1 style="color:red; font-size: 20px; margin-bottom: 30px;">Login to your account</h1>
                    @if (isset($check))
                        <span style="color: red">Sai Tài Khoản Hoặc Mật Khẩu</span>
                    @endif
                    <div class="input-box" style="margin-bottom: 10px;">
                        <i ></i>
                        <input type="text" name="email" placeholder="Enter your email address" style="padding: 7.5px 7.5px;width: 100%; border: 1px solid #cccccc;outline: none;" required>
                    </div>
                    <div class="input-box">
                        <i ></i>
                        <input type="password" name="password" placeholder="Enter password" style="padding: 7.5px 7.5px;width: 100%; border: 1px solid #cccccc;outline: none;" required>
                    </div>
                    <a href="{{ asset('forgotpw') }}">Forgot Password?</a>
                    <div class="btn-box" style="text-align: right;margin-top: 30px;">
                        <button type="submit" style="padding: 7.5px 15px;border-radius: 2px;background-color: #009999;color: #ffffff;border: none;outline: none;">
                            Login
                        </button>
                    </div>
                </form>
            </div>
            </div>
        </main>
    </body>
</html>
@endsection