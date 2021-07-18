@extends('layout_web')
@section('content')
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row" style="margin-bottom: 80px;border-top: solid 1px;border-bottom: solid 1px;padding-bottom:25px;padding-top:25px">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                <span class="font-weight-bold">{{$user->CustomerName}}</span><br>
                <span class="text-black-50">{{$user->email}}</span>
                <button class="btn btn-info" style="text-align: center;width: 150px;margin: 10px 0 10px 0"><a style="color: white" href="{{ asset('changepass') }}">Change Password</a></button>
                <button class="btn btn-info" style="text-align: center;width: 150px;margin: 10px 0 10px 0"><a style="color: white" href="{{ asset('invoices') }}">Purchase History</a></button>
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
                            <div class="col-md-12"><label class="labels" for="name">Name</label><input class="form-control" type="text" name="name" value="{{$user->CustomerName}}"></div>
                            <div class="col-md-12"><label class="labels" for="address">Address</label><input class="form-control" type="text" name="address" value="{{$user->Address}}"></div>
                            <div class="col-md-12"><label class="labels" for="phonenumber">Phone Number</label><input class="form-control" type="text" name="phonenumber" value="{{$user->Phone}}"></div>
                            <div class="col-md-12"><label class="labels" for="email">Email</label><input class="form-control" type="email" name="email" value="{{$user->email}}"></div>
                           <div class="col-md-12"><button type="submit" class="btn btn-warning" style="background: #d1e528;margin-top: 20px">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>                    
    </div>
</div>

@endsection