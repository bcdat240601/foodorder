
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2 style="color: red">Category</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="<?php echo e(asset('shop/'.$item->id)); ?>" style="color: green;"><?php echo e($item->CatagoryName); ?></a></h4>
                            </div>
                        </div>           
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div><!--/category-products-->   
                </div>
            </div>
            
            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="<?php echo e(asset('images/product-details/'.$data->Image_Name)); ?>" alt="" />
                            
                        </div>
                        

                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            <h2 style="color: green"> <?php echo e($data->FoodName); ?></h2>
                            
                            <p><b>Price:</b></p>
                            <span>
                                <span style="color: red"><?php echo e($data->Price); ?> đ</span>
                                <label>Quantity:</label>
                                <input type="text" id="sl-<?php echo e($data->id); ?>" value="1" required>
                                <button type="button" class="btn btn-fefault cart btn-addtocart" data-price="<?php echo e($data->Price); ?>" data-id="<?php echo e($data->id); ?>" data-name="<?php echo e($data->FoodName); ?>" style="background-color: royalblue">
                                    <i class="fa fa-shopping-cart"></i>
                                    Add to cart
                                </button>
                            </span>
                            <p><b>Availability:</b> In Stock</p>
                            <p><b>Order online:</b> Order online for home delivery on time (if late, you will receive a voucher of VND 50000) </p>
                            <strong style="color:red"> Exchange and return products within 7 days</strong>
                        </div><!--/product-information-->
                    </div>
                    <div class="col-sm-7">
                        <div class="product-information">
                            <h2 style="color:green">Product Description</h2>
                            <p><?php echo e($data->Description); ?></p>
                        </div>
                    </div>
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
                    
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
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
           
            $.get("<?php echo e(URL::asset('addtocart')); ?>", {name:name, id:id, sl:soluong, price:price},  
                function (data) {
                    alert('You have successfully added the product to your cart');    
                }
            );
            
        });
    </script>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout_Web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foodorder\resources\views/web/ProductDetail.blade.php ENDPATH**/ ?>