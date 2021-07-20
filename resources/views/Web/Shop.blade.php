@extends('layout_web')
@section('content')
<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>
                    
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span style="color: red">Vegetables</span>-Fresh</h1>
                                <h2 style="color:green">Fresh food of VietNam</h2>
                                <p>Distributing healthy organic food. As a reputable organic food store in Vietnam. For vegetables, tubers and fruits, when referred to as fresh vegetables, fresh raw vegetables means that they have been recently harvested and properly handled post-harvest and are still fresh, 
                                    without wilting, wilting, or wilting.  </p>
                                
                            </div>
                            <div class="col-sm-6">
                                <img src="{{ asset('images/shop/ves1.jpeg') }}"   alt="" />
                            
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span style="color:red">Canner</span>-Food</h1>
                                <h2 style="color:green">100% fresh and clean canned food, ensuring food hygiene and safety.</h2>
                                <p>Canned food, canned fish, canned meat of all kinds are guaranteed quality, safe for health, diverse types. Canning can keep food stable and can be used safely for 1-5 years. 
                                    Order online easy operation, door to door delivery.</p>
                
                            </div>
                            <div class="col-sm-6">
                                <img src="{{ asset('images/shop/canner.jpg') }}" alt="" />
                            </div>
                        </div>
                        
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span style="color: red">Drinks</span>-SHOP</h1>
                                <h2 style="color:green">There are many kinds of soft drinks</h2>
                                <p>Greenfood specializes in distributing soft drinks of all kinds, throughout HCMC and neighboring provinces. 
                                    The company has a high discount, store setup support, consulting...</p>
                                
                            </div>
                            <div class="col-sm-6">
                                <img src="{{ asset('images/shop/drink.jpg') }}"  alt="" />                 
                            </div>
                        </div>
                        
                    </div>
                    
                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</section><!--/slider-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2 style="color:red">Category</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        @foreach ($category as $item)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="{{ asset('shop?id='.$item->id)}}" style="color:green" onmouseover="this.style.color='orange';" onmouseout="this.style.color='green';">{{$item->CatagoryName}}</a></h4>
                            </div>
                        </div>           
                        @endforeach
                    </div><!--/category-productsr-->       
                </div>
            </div>
            
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center" style="color: red">Product Item List</h2>

                @if (isset($data) && !$data->isEmpty() )
                <div style="display: inline-block">
                @foreach ($data as $item)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ asset('images/product-details/'.$item->Image_Name) }}" alt="" style="height: 200px"/>
                                    <h2 style="color: green">{{$item->FoodName}}</h2>
                                    <p style="color: red">{{$item->Price}} $</p>
                                    {{-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> --}}
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2  style="color: green"><span id="price-{{$item->id}}">{{$item->Price}}</span><span>$</span></h2>
                                        
                                        <p>{{$item->FoodName}}</p>
                                        <input type="text" id="sl-{{$item->id}}" value="1" required>
                                        <button  class="btn btn-default add-to-cart" data-name="{{$item->FoodName}}" data-id="{{$item->id}}"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                    </div>
                                </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="{{ asset('/detail?id='.$item->id) }}"><i class="fa fa-plus-square"></i>Detail</a></li>
                                    <li><button class="add-wish" data-name="{{$item->FoodName}}" data-id="{{$item->id}}"><i class="fa fa-plus-square"></i>Add to wishlist</button></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
                
                    <div>
                        @if (isset($id))
                        {!! $data->appends(['id'=>$id])->render() !!}
                        @endif
                        @if (isset($search))
                        {!! $data->appends(['search'=>$search])->render() !!}
                        @endif
                    </div>
                @else
                <h2>Product Not Found !!!!</h2>
                @endif
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>
    
@endsection

@section('scripts')
    <script>
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
            
            if (soluong == "" || soluong == 0){
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
        $('.add-wish').click(function () {      
            var name = $(this).data('name');                   
            var f = confirm('Are You Sure To Add '+name+' To Wishlist ?');
            var id = $(this).data('id');
            if(f == true){                
                $.get('addwish',{id:id},function(data){
                    if(data == 0){
                        alert('You Must Login To Add This Item To Wishlist');                        
                    }
                    if(data == 1){
                        alert('Add To Wishlist Successfully');                        
                    }
                    if(data == 2){
                        alert('This Product Is Already In Wishlist');                        
                    }                    
                });
            }            
        });
    </script>
@endsection