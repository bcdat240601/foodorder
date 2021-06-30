@extends('admin/layout')
@section('content')
<div class="container" style="margin-left: 100px">
    <h2 style="color: red">Edit Category:</h2>
    <form action="{{ route("category.edit") }}" enctype="multipart/form-data" method="POST">
        @csrf
        <br><p style="color: green">ID:</p><input type="text" name="id" value="{{$data->id}}"/><br>
        <p style="color: green">Catagory Name:</p><input type="text"  name="CatagoryName" value="{{$data->CatagoryName}}"/><br>
        <p style="color: green">Description:</p><input type="text" name="Description" value="{{$data->Description}}"/><br>
        <br><input type="submit" value="Edit Category" style="background-color: crimson; color: white"/>
        <button style="background-color: green;"><a href="{{ asset('admin/category/indexcategory') }}" style="color: white">Return Manage Category page</a></button><br>
        <br>
    </form>
</div>
@endsection