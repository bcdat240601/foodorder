@extends('admin/layout')
@section('content')
<div class="container" style="margin-left: 100px">
    <h2 style="color: red">Edit Customer</h2>
    <form action="{{ route('customer.edit')}}" enctype="multipart/form-data" method="POST">
        @csrf
        <br><p style="color: green">ID:</p><input type="text" name="id" value="{{$data->id}}" style="width: 300px"><br>
        <p style="color: green">Customer Name:</p><input type="text" name="CustomerName" value="{{$data->CustomerName}}" style="width: 300px"><br>
        <p style="color: green">Address:</p><input type="text" name="Address" value="{{$data->Address}}" style="width: 300px"><br>
        <p style="color: green">Phone:</p><input type="phone" name="Phone" value="{{$data->Phone}}" style="width: 300px"><br>
        <p style="color: green">Email:</p><input type="email" name="Email" value="{{$data->Email}}" style="width: 300px"><br>
        <p style="color: green">Password:</p><input type="password" name="Password" value="{{$data->Password}}" style="width: 300px"><br>
        <br><input type="submit" value="Edit Customer" style="background-color: crimson; color: white">
        <button style="background-color: green;"><a href="{{ asset('admin/customer/indexcustomer') }}" style="color: white">Return Manage Customer page</a></button><br>
        <br>
    </form>
</div>
@endsection