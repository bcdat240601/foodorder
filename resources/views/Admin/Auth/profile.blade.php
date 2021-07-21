@extends('admin/layout')
@section('content')
<style>
    .cont{
        background-image: linear-gradient(291deg,#e9b626 10%,#ebef40 100%);
        margin-top: 21px;
        box-shadow: 5px 16px #2b7986;
    }
    h4{
        color: #880416;
    }
    label{
        color: #880416;
    }
    .ava{
        background-image: linear-gradient( 
291deg
 ,#060606 10%,#e0e0dc 100%);
    margin-top: 21px;
    box-shadow: 5px 16px #c6bf6b;
    }
</style>
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5 ava"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                <span class="font-weight-bold" style="color: antiquewhite;">{{$admin->name}}</span><br>
                <span class="text-black-50" style="    color: yellow !important">{{$admin->email}}</span>
                {{-- <button style="text-align: center"><a href="{{ asset('changepass') }}">Đổi mật khẩu</a></button> --}}
            </div>            
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5 cont">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <form action="{{ route('editadmin')}}" method="post">
                    @csrf
                    <div class="row mt-2">
                        <div class="row mt-3">                                        
                            <input type="text" name="id" value="{{$admin->id}}" style="display: none">
                            <div class="col-md-12"><label class="labels" for="name">Tên</label><input class="form-control" type="text" name="name" value="{{$admin->name}}" required></div>
                            <div class="col-md-12"><label class="labels" for="email">Email</label><input class="form-control" type="email" name="email" value="{{$admin->email}}" required></div>
                           <div class="col-md-12"><button type="submit" class="btn btn-warning" style="background: #06155b;">Confirm</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>                    
    </div>
</div>
@endsection