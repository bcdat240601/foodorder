@extends('admin/layout')
@section('content')

<div class="container">
    <br>
        {{-- <button style="background-color: crimson;"><a href="{{ asset('admin/product/add') }}" style="color: white">Add New Product</a></button><br> --}}
        <div class="product">
            <div class="">
            <img class="imge" src="{{ asset('images/product-details/'.$data->Image_Name) }}" alt="" />
            </div>
            <div class="info">
                <h2 style="color: green"> {{$data->FoodName}}</h2>
                <h2 style="color:green">Product Description</h2>
                            <p>{{$data->Description}}</p>
            </div>
        </div>
    <br>
    <div class="table-responsive">
    <table class="table table-bordered display" id="table_id">
        <thead>
            <tr>
                <td style="color: white; background-color: #72A1E5">Avatar</td>
                <td style="color: white; background-color: #72A1E5">Customer Name</td>
                <td style="color: white; background-color: #72A1E5">Comment</td>
                <td style="color: white; background-color: #72A1E5">Delete</td>
            </tr>
        </thead>
        <tbody>
            @if (isset($binhluan))
            @foreach ($binhluan as $item)
                <tr id="cmt-{{$item->stt}}" data-id="{{$item->stt}}">
                    <td style="color: black">
                        <img class="img-profile rounded-circle"src="{{ asset('img/man.png') }}" style="text-align: right;">
                    </td>
                    <td style="color: black;font-family: ui-monospace;font-size: 22px;">
                        <span>{{$item->CustomerName}}</span>
                    </td>
                    <td style="color: Green">
                        {{$item->loibinhluan}}
                    </td>
                    <td><button class="delete" data-row="{{$item->stt}}">Delete</button></td>
                </tr>
            @endforeach
            @endif
        </tbody>
    </table>
    </div>
</div>
    
@endsection
@section('script')
<script>
       $(".delete").click(function () {         
            var f=confirm("Bạn có muốn xóa");
            if(f==true)
            {     
                var row=$(this).data("row");                
                $.get("comment/delete",{row:row},function(data){
                });
                $("#cmt-"+row).hide();
            }
        });
        </script>
@endsection