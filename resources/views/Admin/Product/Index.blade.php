@extends('admin/layout')
@section('content')
<div class="container">
    <div class="table-responsive"> 
    <br>
        <button style="background-color: crimson;"><a href="{{ asset('admin/product/add') }}" style="color: white">Add New Product</a></button><br>
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
                <td style="color: white; background-color: orangered">Selling Status</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr id="h-{{$item->id }}" data-id="{{$item->id}}">
                    <td style="color: green">
                        {{$item->id}}
                    </td>
                    <td style="color: black">
                        {{$item->FoodName}}
                    </td>
                    <td style="color:gray">
                        {{$item->Price}}
                    </td>
                    <td  style="color: orange">
                        <span id="quan-{{$item->id}}">{{$item->Quantity}}</span>
                    </td>
                    <td style="color: green">
                        {{$item->CategoryID}}
                    </td>
                    <td>
                        <img src="{{ asset('images/product-details/'.$item->Image_Name) }}" alt="" style="width: 50px; height: 50px;">
                    </td>
                    <td>
                        <a href="{{ asset('admin/product/edit/'.$item->id) }}">Edit</a>
                    </td>
                    <td><button @if ($item->Quantity==0)
                        style="display:none;"
                    @elseif($item->Quantity>0)
                    style="display:block;"
                    @endif class="delete" id="of-{{$item->id}}" data-row="{{$item->id}}">Sold out</button>
                    <button @if ($item->Quantity==0)
                        style="display:block;"
                    @elseif($item->Quantity>0)
                    style="display:none;"
                    @endif class="on" id="on-{{$item->id}}" data-row="{{$item->id}}">Sell</button>
                    </td>
                </tr>
            @endforeach
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
                $.get("food/delete",{row:row},function(data){                   
                    $("#of-"+row).hide();
                    $("#on-"+row).show();
                    document.getElementById("quan-"+row).innerText=0;                 
                });                
            }
        });
        $(".on").click(function () {         
            var f=confirm("Are you sure");
            if(f==true)
            {     
                var row=$(this).data("row");                                
                $.get("food/on",{row:row},function(data){                   
                    $("#of-"+row).show();
                    $("#on-"+row).hide();  
                    document.getElementById("quan-"+row).innerText=1;                  
                });                
            }
        });
</script>
@endsection