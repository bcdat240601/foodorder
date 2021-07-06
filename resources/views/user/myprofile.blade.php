@extends('layout_web')
@section('content')
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                <span class="font-weight-bold">{{$user->CustomerName}}</span><br>
                <span class="text-black-50">{{$user->email}}</span>
                <button style="text-align: center"><a href="{{ asset('changepass') }}">Đổi mật khẩu</a></button>
            </div>            
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <form action="{{ route('editkh')}}" method="post">
                    @csrf
                    <div class="row mt-2">
                        <div class="row mt-3">                                        
                            <input type="text" name="id" value="{{$user->id}}" style="display: none">
                            <div class="col-md-12"><label class="labels" for="name">Tên</label><input class="form-control" type="text" name="name" value="{{$user->CustomerName}}"></div>
                            <div class="col-md-12"><label class="labels" for="address">Địa Chỉ</label><input class="form-control" type="text" name="address" value="{{$user->Address}}"></div>
                            <div class="col-md-12"><label class="labels" for="phonenumber">Số điện thoại</label><input class="form-control" type="text" name="phonenumber" value="{{$user->Phone}}"></div>
                            <div class="col-md-12"><label class="labels" for="email">Email</label><input class="form-control" type="email" name="email" value="{{$user->email}}"></div>
                           <div class="col-md-12"><button type="submit" class="btn btn-warning" style="background: #d1e528;">lưu</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>                    
    </div>
</div>

@endsection