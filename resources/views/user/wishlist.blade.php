@extends('layout_web')
@section('content')
<div style="width: 100%;display: inline-block">
    @if (isset($wishlist))
    @foreach ($wishlist as $item)
    <div class="col-sm-3" >
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <img src="{{ asset('images/product-details/'.$item->Image_Name) }}" alt="" style="height: 200px"/>
                    <h2 style="color: green">{{$item->FoodName}}</h2>
                    <p style="color: red">{{$item->Price}} đ</p>
                    {{-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> --}}
                </div>
                <div class="product-overlay">
                    <div class="overlay-content">
                        <h2  style="color: green"><span id="price-{{$item->id}}">{{$item->Price}}</span><span> đ</span></h2>
                        
                        <p>{{$item->FoodName}}</p>
                        <input style="top:-13px;position:relative;" type="text" id="sl-{{$item->id}}" value="1" required>
                        <button  class="btn btn-default add-to-cart" data-name="{{$item->FoodName}}" data-id="{{$item->id}}"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                    </div>
                </div>
            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="{{ asset('/detail?id='.$item->id) }}"><i class="fa fa-plus-square"></i>Detail</a></li>
                    <li><button class="delete" data-name="{{$item->FoodName}}" data-id="{{$item->id}}"><i class="fa fa-minus-square"></i>Delete</button></li>                                
                </ul>
            </div>
        </div>
    </div>
    @endforeach
@else
    <h2>Chưa Có Sản Phẩm Nào Trong Danh Sách Yêu Thích</h2>
@endif

</div>
@endsection
@section('scripts')
    <script>
        $('.delete').click(function () { 
            var name = $(this).data('name');
            var id = $(this).data('id');
            var f = confirm('Do you want to delete'+ name + ' ?');
            if(f == true){                
                $.get('delete',{id:id},function(data){
                    alert(data);
                    window.location.reload(true);                    
                });
            }
        });
        $(".add-to-cart").click(function (e) { 
            var id =$(this).data("id");  
            

            var id_sl="sl-"+id;
            var soluong=$("#"+id_sl).val();
            if(!Math.floor(soluong) == soluong || !$.isNumeric(soluong) || soluong < 0){
                alert('You Entered Wrong Number Of Quantity!!!!!');
                $("#"+id_sl).focus();
                return;
            }   
            var id_price="price-"+id;
            var price =$("#"+id_price).text();
            var name =$(this).data("name");
            
            if (soluong=="" || soluong == 0){
                alert("You Entered Wrong Number Of Quantity!!!")
                $("#"+id_sl).focus();
                return;
            }
           
            $.get("{{ URL::asset('addtocart') }}", {name:name, id:id, sl:soluong, price:price},  
                function (data) {
                    alert('You have successfully added the product to your cart');    
                }
            );
            

            
            
        });
    </script>
@endsection