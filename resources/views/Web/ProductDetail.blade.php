@extends('layout_Web')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2 style="color: red">Category</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        @foreach ($category as $item)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="{{ asset('shop?id='.$item->id)}}" style="color: green;">{{$item->CatagoryName}}</a></h4>
                            </div>
                        </div>           
                        @endforeach
                    </div><!--/category-products-->   
                </div>
            </div>
            
            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="{{ asset('images/product-details/'.$data->Image_Name) }}" alt="" />
                            
                        </div>
                        

                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            <h2 style="color: green"> {{$data->FoodName}}</h2>
                            {{-- <p><b>ID:</b> {{$data->id}}</p> --}}
                            <p><b>Price:</b></p>
                            <span>
                                <span style="color: red">{{$data->Price}} đ</span>
                                <label>Quantity:</label>
                                <input type="text" id="sl-{{$data->id}}" value="1" required>
                                <button type="button" class="btn btn-fefault cart btn-addtocart" data-price="{{$data->Price}}" data-id="{{$data->id}}" data-name="{{$data->FoodName}}" style="background-color: royalblue">
                                    <i class="fa fa-shopping-cart"></i>
                                    Add to cart
                                </button>
                                <button type="button" class="btn btn-fefault cart btn-cmt" data-id="{{$data->id}}">
                                    <i class="fa fa-shopping-cart"></i>
                                    comment
                                </button>
                            </span>
                            <p><b>Availability:</b> In Stock</p>
                            <p><b>Order online:</b> Order online for home delivery on time (if late, you will receive a voucher of VND 50000) </p>
                            <strong style="color:red"> Exchange and return products within 7 days</strong>
                        </div><!--/product-information-->
                    </div>
                    <div class="col-sm-8" class="col-sm-7 cmt" style="width: 100%">
                        <div class="product-information" style="">
                            <h2 style="color:green">Product Description</h2>
                            <p>{{$data->Description}}</p>
                        </div>
                    </div>
                    <div class="col-sm-7 cmt" style="width: 100%;">
                        <div class="product-information"  style="padding-bottom:5px;">
                            <h2 style="color:rgb(235, 181, 44);">Product Comment</h2>                                                            
                                <div class="row mt-2">
                                    <div class="row mt-3">
                                <input type="text" name="id" class="getidfood" value="{{$data->id}}" style="display: none">                                
                                <div class="col-md-12"><label class="labels" for="Comment"></label> <img class="img-profile rounded-circle"src="{{ asset('img/man.png') }}" style="text-align: right;">
                                    <input class="form-control formnhap" type="text" name="comment" style="width:79%;text-align:left;margin-left: 14%;margin-top: -39px;">
                                    <button type="submit" class="btn btn-warning binhluan" style="background: #7553f1;margin-top:11px;margin-bottom: 11px;">Lưu</button>
                                </div>
                                {{-- <div class="col-md-12">   
                            </div> --}}
                                    </div>                                                    
                                </div>
                        </div>
                        {{-- binhluan --}}
                        <div id="cmtarea" style="overflow-y: scroll;height:200px;padding-top:0px;border: 1px solid black;">
                            <div class="product-information" >
                            @if (isset($binhluan))
                                @foreach ($binhluan as $item)
                                <span><img class="img-profile rounded-circle"src="{{ asset('img/man.png') }}" style="text-align: right;"><h3 class="name" style="margin-top: -58px;
                                    margin-left: 60px;">{{$item->CustomerName}}</h3></span>
                                    <span class="cmt" style=" margin-left: 64px;margin-top: -3px;">{{$item->loibinhluan}}</span>
                                @endforeach
                            @endif
                            </div>
                        </div>
                        {{-- endbinhluan --}}
                    </div><!--/product-details-->

                    <div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center" style="color: red">Related products</h2>
                        
                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">	
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="images/home/recommend1.jpg" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="images/home/recommend2.jpg" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="images/home/recommend3.jpg" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">	
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="images/home/recommend1.jpg" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="images/home/recommend2.jpg" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="images/home/recommend3.jpg" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
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
                <span style="display: none" id="getcusname">@if (session()->has('namekh')){{session()->get('namekh')}}@endif</span>    
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
    <script>
        $(".btn-addtocart").click(function (e) { 
            var id= $(this).data("id");
            var name=$(this).data("name");
            var price=$(this).data("price");
            var id_sl="sl-"+id;
            var soluong=$("#"+id_sl).val();

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
        $(".btn-cmt").click(function (e) {
           var id= $(this).data("id");
           $(".cmt").css("display","block");
        
        });
        $('.binhluan').click(function () { 
            var loibinhluan = $('.formnhap').val();
            var idfood = $('.getidfood').val();
            var cusname = $('#getcusname').text();            
            if(loibinhluan != ''){
                $.post('comment',{"_token": "{{ csrf_token() }}",loibinhluan:loibinhluan,idfood:idfood},function(data){
                    if(data == 0){
                        alert('Bạn Phải Đăng Nhập Để Bình Luận');
                    }
                    if(data != 0){                        
                        $('#cmtarea').prepend(data);
                    }                    
                });
            }else{
                alert('Bạn Chưa Nhập Gì Vào Khung Bình Luận');
            }
            
        });

    </script>
    
@endsection
