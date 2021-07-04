@extends('admin/layout')
@section('content')
<div class="container">
    <br>
        {{-- <button style="background-color: crimson;"><a href="{{ asset('admin/product/add') }}" style="color: white">Add New Product</a></button><br> --}}
        <br>
    <table class="table table-bordered display" id="table_id">
        <thead>
            <tr>
                <td style="color: white; background-color: orangered">ID</td>
                <td style="color: white; background-color: orangered">FoodName</td>
                <td style="color: white; background-color: orangered">Price</td>
                <td style="color: white; background-color: orangered">Quantity</td>
                <td style="color: white; background-color: orangered">CategoryID</td>
                <td style="color: white; background-color: orangered">Image_Name</td>
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
                        {{$item->FoodName}}
                    </td>
                    <td style="color:gray">
                        {{$item->Price}}
                    </td>
                    <td style="color: orange">
                        {{$item->Quantity}}
                    </td>
                    <td style="color: green">
                        {{$item->CategoryID}}
                    </td>
                    <td>
                        <img src="{{ asset('images/product-details/'.$item->Image_Name) }}" alt="" style="width: 50px; height: 50px;">
                    </td>
                    <td>
                        <a href="{{ asset('admin/product/comment/'.$item->id) }}">Comment</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    
@endsection