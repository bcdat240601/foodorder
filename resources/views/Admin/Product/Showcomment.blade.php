@extends('admin/layout')
@section('content')
<div class="container">
    <br>
        {{-- <button style="background-color: crimson;"><a href="{{ asset('admin/product/add') }}" style="color: white">Add New Product</a></button><br> --}}
        <br>
    <table class="table table-bordered display" id="table_id">
        <thead>
            <tr>
                <td style="color: white; background-color: orangered">Avatar</td>
                <td style="color: white; background-color: orangered">Customer Name</td>
                <td style="color: white; background-color: orangered">Comment</td>
            </tr>
        </thead>
        <tbody>
            @if (isset($binhluan))
            @foreach ($binhluan as $item)
                <tr>
                    <td style="color: black">
                        <img class="img-profile rounded-circle"src="{{ asset('img/man.png') }}" style="text-align: right;">
                    </td>
                    <td style="color: black;font-family: ui-monospace;font-size: 22px;">
                        <span>{{$item->CustomerName}}</span>
                    </td>
                    <td style="color: Green">
                        {{$item->loibinhluan}}
                    </td>
                </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>
    
@endsection
