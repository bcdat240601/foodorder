@extends('layout_web')
@section('content')
@if (!isset($check))
<main style="background-color:white; min-height: 300px; padding: 7.5px 15px;">
    <div class="container" style="width: 100%; max-width: 1200px; margin-left: auto; margin-right: auto;">
    <div class="login-form" style="width: 100%; max-width: 500px; margin: 30px auto;  background-color: #ffffff; padding: 20px; border: 3px dotted #cccccc; border-radius: 10px;">
        <form method="POST" action="{{ route('sendmail') }}">
            @csrf
            <h1 style="color:red; font-size: 20px; margin-bottom: 30px;">Forgot Password</h1>
            @if (isset($error))
                <span style="color: red">Không Tồn Tại Email Bạn Vừa Nhập</span>
            @endif
            <div class="input-box" style="margin-bottom: 10px;">
                <i ></i>
                <input type="text" name="email" placeholder="Enter your email address" style="padding: 7.5px 7.5px;width: 100%; border: 1px solid #cccccc;outline: none;" required>
            </div>            
            <div class="btn-box" style="text-align: right;margin-top: 30px;">
                <button type="submit" style="padding: 7.5px 15px;border-radius: 2px;background-color: #009999;color: #ffffff;border: none;outline: none;">
                    Bước Tiếp Theo
                </button>
            </div>
        </form>
    </div>
    </div>
</main>
@endif
@if (isset($check) && $check == 1)
<main style="background-color:white; min-height: 300px; padding: 7.5px 15px;">
    <div class="container" style="width: 100%; max-width: 1200px; margin-left: auto; margin-right: auto;">
    <div class="login-form" style="width: 100%; max-width: 500px; margin: 30px auto;  background-color: #ffffff; padding: 20px; border: 3px dotted #cccccc; border-radius: 10px;">
        <form method="POST" action="{{ route('verifycode') }}">
            @csrf
            <h1 style="color:red; font-size: 20px; margin-bottom: 30px;">Nhập Mã Xác Nhận</h1>
            @if (isset($error))
                <span style="color: red">Nhập Không Đúng Mã Xác Nhận</span>
            @endif
            @if (isset($email))
            <input type="text" name="" value="{{$email}}" id="getemail" placeholder="Nhập Mã Xác Nhận" style="padding: 7.5px 7.5px;width: 100%; border: 1px solid #cccccc;outline: none;display:none">
            @endif
            <div class="input-box" style="margin-bottom: 10px;">
                <i ></i>
                <input type="text" name="code" placeholder="Nhập Mã Xác Nhận" style="padding: 7.5px 7.5px;width: 100%; border: 1px solid #cccccc;outline: none;" >
                <button id="sendagain">Gửi Lại Mã</button>
            </div>            
            <div class="btn-box" style="text-align: right;margin-top: 30px;">
                <button type="submit" style="padding: 7.5px 15px;border-radius: 2px;background-color: #009999;color: #ffffff;border: none;outline: none;">
                    Bước Tiếp Theo
                </button>
            </div>
        </form>
    </div>
    </div>
</main>
@endif
@if (isset($check) && $check == 2)
<main style="background-color:white; min-height: 300px; padding: 7.5px 15px;">
    <div class="container" style="width: 100%; max-width: 1200px; margin-left: auto; margin-right: auto;">
    <div class="login-form" style="width: 100%; max-width: 500px; margin: 30px auto;  background-color: #ffffff; padding: 20px; border: 3px dotted #cccccc; border-radius: 10px;">
        <form method="POST" action="{{ route('getpass') }}">
            @csrf
            <h1 style="color:red; font-size: 20px; margin-bottom: 30px;">Thay Đổi Mật Khẩu</h1>
            @if (isset($error))
                <span style="color: red">Nhập Lại Mật Khẩu Không Trùng Khớp</span>
            @endif
            <div class="input-box" style="margin-bottom: 10px;">
                <i ></i>
                <input type="password" name="password1" placeholder="Nhập Password Muốn Đổi" style="padding: 7.5px 7.5px;width: 100%; border: 1px solid #cccccc;outline: none;" required>                
            </div>       
            <div class="input-box">
                <i ></i>
                <input type="password" name="password2" placeholder="Nhập Lại Password" style="padding: 7.5px 7.5px;width: 100%; border: 1px solid #cccccc;outline: none;" required>
            </div>     
            <div class="btn-box" style="text-align: right;margin-top: 30px;">
                <button type="submit" style="padding: 7.5px 15px;border-radius: 2px;background-color: #009999;color: #ffffff;border: none;outline: none;">
                    Xác Nhận
                </button>
            </div>
        </form>
    </div>
    </div>
</main>
@endif
@endsection
@section('scripts')
    <script>
        $('#sendagain').click(function () {             
            var email = $('#getemail').val();            
            $.post('sendemail',{"_token": "{{ csrf_token() }}",email:email},function(){
                alert('Đã Gửi Lại Mã Xác Nhận');
            });
        });
    </script>
@endsection