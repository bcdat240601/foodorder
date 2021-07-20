@extends('admin/layout')
@section('content')

<div class="container">
    <br>
        {{-- <button style="background-color: crimson;"><a href="{{ asset('admin/product/add') }}" style="color: white">Add New Product</a></button><br> --}}
        {{-- <div class="product">
            <div class="">
            <img class="imge" src="{{ asset('images/product-details/'.$data->Image_Name) }}" alt="" />
            </div>
            <div class="info">
                <h2 style="color: green"> {{$data->FoodName}}</h2>
                <h2 style="color:green">Product Description</h2>
                            <p>{{$data->Description}}</p>
            </div>
        </div> --}}
    <br>
    <div class="table-responsive">
    <table class="table table-bordered display" id="table_id">
        <thead>
            <tr>
                <td style="background-color: yellow;color:black;">Food Name</td>
                <td style="background-color: yellow;color:black;">Quantity</td>
                <td style="background-color: yellow;color:black;">Unit Cost</td>
                <td style="background-color: yellow;color:black;">Sub Total</td>
                <td style="background-color: yellow;color:black;">Date</td>
                <td style="background-color: yellow;color:black;">Delete</td>
            </tr>
        </thead>
        <tbody>
            @if (isset($hoadondt))
                @foreach ($hoadondt as $item)
                <tr id="h-{{$item->FoodID}}" data-id="{{$item->FoodID}}">
                    <td><a>{{$item->FoodName}}</a></td>
                    <td><a>{{$item->Quantity}}</a></td>                                                                
                    <td> {{number_format($item->UnitCost)}} $</td>
                    <td> {{number_format($item->Subtotal)}} $</td>
                    <td> {{$item->created_at}}</td>
                    <td><button class="delete" data-row="{{$item->FoodID}}" data-rows="{{$item->OrderFoodID}}">Delete</button></td>
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
            var f=confirm("Are you sure");
            if(f==true)
            {     
                var row=$(this).data("row");
                var rows=$(this).data("rows");                
                $.get("detailbill/delete",{row:row,rows:rows},function(data){
                });
                $("#h-"+row).hide();
            }
        });
        </script>
@endsection