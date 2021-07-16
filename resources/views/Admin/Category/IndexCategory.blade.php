@extends('admin/layout')
@section('content')
<div class="container">
    <div class="table-responsive">
    <table class="table table-bordered display" id="table_id">
        <br>
        <button style="background-color: crimson;"><a href="{{ asset('admin/category/addcategory') }}" style="color: white">Add New Category</a></button><br>
        <br>
        <thead>
            <tr>
                <td style="color: white; background-color: orangered">ID</td>
                <td style="color: white; background-color: orangered">CategoryName</td>
                <td style="color: white; background-color: orangered">Description</td>
                <td style="color: white; background-color: orangered">Status</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td style="color: green">
                    {{$item->id}}
                </td>
                <td style="color: black">
                    {{$item->CatagoryName}}
                </td>
                <td style="color: green">
                    {{$item->Description}}
                </td>
                <td>
                    <a href="{{ asset('admin/category/edit/'.$item->id) }}">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection