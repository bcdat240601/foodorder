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
                                <h1><span style="color: red">Fresh</span>-FOOD</h1>
                                <h2 style="color:green">Fresh food of VietNam</h2>
                                <p>Distributing healthy organic food. As a reputable organic food store in Vietnam. For vegetables, tubers and fruits, when referred to as fresh vegetables, fresh raw vegetables means that they have been recently harvested and properly handled post-harvest and are still fresh, 
                                    without wilting, wilting, or wilting.  </p>
                                
                            </div>
                            <div class="col-sm-6">
                                <img src="images/home/c.jpg"   alt="" />
                            
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span style="color:red">Sea</span>-Food</h1>
                                <h2 style="color:green">100% Clean, fresh, quality seafood</h2>
                                <p>All products of the store are safe and hygienic, completely assured of the origin, as well as the freshness. The seafood here is all first class. There are many kinds of 
                                    seafood for you to choose from: crabs, crabs, shrimps, scallops... </p>
                
                            </div>
                            <div class="col-sm-6">
                                <img src="images/home/sea1.jpg" alt="" />
                            </div>
                        </div>
                        
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span style="color: red">Fruit</span>-SHOP</h1>
                                <h2 style="color:green">100% fresh and clean fruit</h2>
                                <p>GreenFood optimizes input costs and labor costs to bring better prices of imported fruits. Besides, we are working hard to optimize shipping costs 
                                    for you if you are outside the free delivery distance. </p>
                                
                            </div>
                            <div class="col-sm-6">
                                <img src="images/home/Fruit.jpg"  alt="" />                 
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
                                <h4 class="panel-title"><a href="{{ asset('shop?id='.$item->id)}}" style="color: green;">{{$item->CatagoryName}}</a></h4>
                            </div>
                        </div>           
                        @endforeach     
                    </div><!--/category-products-->
                    <div class="shipping text-center"><!--shipping-->
                        <img src="{{ asset('images/home/s11.jpg')}}" alt="" />
                    </div><!--/shipping-->   
                    <div class="shipping text-center"><!--shipping-->
                        <img src="{{ asset('img/market.jpg')}}" alt=""  style="width:270px;height:340px;"/>
                    </div><!--/shipping--> 
                </div>
            </div>
            
            <div class="col-sm-9 padding-right">
                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center" style="color: red">New product</h2>
                    
                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">	
                                @if (isset($new))
                                @foreach ($new as $item)	
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img style="height: 255px;" src="{{ asset('images/product-details/'.$item->Image_Name) }}" alt="" />
                                                <h2>${{$item->Price}}</h2>
                                                <p style="color: #0D5C63;">{{$item->FoodName}}</p>
                                                {{-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> --}}
                                            </div>
                                            <div class="product-overlay">
                                                <div class="overlay-content">
                                                    <h2><span id="price-{{$item->id}}">{{$item->Price}}</span><span> đ</span></h2>
                                                    <p style="color: #0D5C63;">{{$item->FoodName}}</p>
                                                    <input type="text" id="sl-{{$item->id}}" value="1" required>
                                                    <button  class="btn btn-default add-to-cart" data-name="{{$item->FoodName}}" data-id="{{$item->id}}"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                                @endforeach
                                @endif  
                            </div>
                            <div class="item">	
                                @if (isset($new))
                                @foreach ($new as $item)	
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img style="height: 255px;" src="{{ asset('images/product-details/'.$item->Image_Name) }}" alt="" />
                                                <h2>${{$item->Price}}</h2>
                                                <p style="color: #0D5C63;">{{$item->FoodName}}</p>
                                                {{-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> --}}
                                            </div>
                                            <div class="product-overlay">
                                                <div class="overlay-content">
                                                    <h2><span id="price-{{$item->id}}">{{$item->Price}}</span><span> đ</span></h2>
                                                    <p style="color: #0D5C63;">{{$item->FoodName}}</p>
                                                    <input type="text" id="sl-{{$item->id}}" value="1" required>
                                                    <button  class="btn btn-default add-to-cart" data-name="{{$item->FoodName}}" data-id="{{$item->id}}"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                         <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left" style="background-color: seagreen"></i>
                          </a>
                          <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right" style="background-color:seagreen"></i>
                          </a>			
                    </div>
                </div>
                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center" style="color: red">Best Seller products</h2>
                    
                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                @if (isset($thongke))
                                @foreach ($thongke as $item)	
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img style="height: 255px;" src="{{ asset('images/product-details/'.$item->Image_Name) }}" alt="" />
                                                <h2>${{$item->Price}}</h2>
                                                <p style="color: #0D5C63;">{{$item->FoodName}}</p>
                                                {{-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> --}}
                                            </div>
                                            <div class="product-overlay">
                                                <div class="overlay-content">
                                                    <h2><span id="price-{{$item->id}}">{{$item->Price}}</span><span> đ</span></h2>
                                                    <p style="color: #0D5C63;">{{$item->FoodName}}</p>
                                                    <input type="text" id="sl-{{$item->id}}" value="1" required>
                                                    <button  class="btn btn-default add-to-cart" data-name="{{$item->FoodName}}" data-id="{{$item->id}}"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                </div>
                                            </div>   
                                        </div>
                                    </div>  
                                </div>
                                @endforeach
                                @endif
                            </div>
                            <div class="item">	
                                @if (isset($thongke))
                                @foreach ($thongke as $item)	
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img style="height: 255px;" src="{{ asset('images/product-details/'.$item->Image_Name) }}" alt=""  />
                                                <h2>${{$item->Price}}</h2>
                                                <p style="color: #0D5C63;">{{$item->FoodName}}</p>
                                                {{-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> --}}
                                            </div>
                                            <div class="product-overlay">
                                                <div class="overlay-content">
                                                    <h2><span id="price-{{$item->id}}">{{$item->Price}}</span><span> đ</span></h2>
                                                    <p style="color: #0D5C63;">{{$item->FoodName}}</p>
                                                    <input type="text" id="sl-{{$item->id}}" value="1" required>
                                                    <button  class="btn btn-default add-to-cart" data-name="{{$item->FoodName}}" data-id="{{$item->id}}"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                         <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            {{-- <i class="fa fa-angle-left"></i> --}}
                          </a>
                          <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            {{-- <i class="fa fa-angle-right"></i> --}}
                          </a>			
                    </div>
                </div>
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center" style="color: red">All Product</h2>
                    @if (isset($all))
                     @foreach ($all as $item)	
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img style="height: 255px;" src="{{ asset('images/product-details/'.$item->Image_Name) }}" alt="" />
                                        <h2>{{$item->Price}}đ</h2>
                                        <p style="color: #0D5C63;">{{$item->FoodName}}</p>
                                        {{-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> --}}
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2><span id="price-{{$item->id}}">{{$item->Price}}</span><span> đ</span></h2>
                                            <p style="color: #0D5C63;">{{$item->FoodName}}</p>
                                            <input type="text" id="sl-{{$item->id}}" value="1" required>
                                            <button  class="btn btn-default add-to-cart" data-name="{{$item->FoodName}}" data-id="{{$item->id}}"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                        </div>
                                    </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="{{ asset('/detail?id='.$item->id) }}"><i class="fa fa-plus-square"></i>Detail</a></li>
                                    <li><button class="add-wish" data-name="{{$item->FoodName}}" data-id="{{$item->id}}"><i class="fa fa-plus-square"></i>Add to wishlist</button></li>
                                    {{-- <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
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

            var id_price="price-"+id;
            var price =$("#"+id_price).text();
            var name =$(this).data("name");
            
            if (soluong=="" && soluong ==0){
                alert("không co")
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
            var f = confirm('Bạn Có Chắc Muốn Thêm '+name+' Vào Danh Sách Ưa Thích');
            var id = $(this).data('id');
            if(f == true){                
                $.get('addwish',{id:id},function(data){
                    if(data == 0){
                        alert('Bạn Phải Đăng Nhập Để Thêm Sản Phẩm Vào Danh Sách Yêu Thích');                        
                    }
                    if(data == 1){
                        alert('Thêm Vào Danh Sách Yêu Thích Thành Công');                        
                    }
                    if(data == 2){
                        alert('Đã Thêm Sản Phẩm Này Vào Danh Sách Ưa Thích');                        
                    }                    
                });
            }            
        });
    </script>
@endsection