@extends('admin/layout')
@section('content')
<div class="container" style="margin-left: 100px">
    <h2 style="color: red">Add Category:</h2>
    <form action="{{route('category.add')}}" enctype="multipart/form-data" method="POST">
    @csrf
    <br><p style="color: green">Category Name:</p><input type="text" name="CatagoryName"/><br>
        <p style="color: green">Description:</p>
        <textarea name="Description" id="" cols="80" rows="10"></textarea><br>
    <br><input type="submit" value="Add category" style="background-color: crimson; color: white; width: 150px;"/>
        <button style="background-color: green;"><a href="{{ asset('admin/category/indexcategory') }}" style="color: white">Return Manage Category page</a></button><br>
        <br>
    </form>
</div>
@endsection