
<?php $__env->startSection('content'); ?>
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
                                <img src="<?php echo e(asset('images/shop/ves1.jpeg')); ?>"   alt="" />
                            
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
                                <img src="<?php echo e(asset('images/shop/canner.jpg')); ?>" alt="" />
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
                                <img src="<?php echo e(asset('images/shop/drink.jpg')); ?>"  alt="" />                 
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
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="<?php echo e(asset('shop/freshfood')); ?>" style="color:green">Fresh Food</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="<?php echo e(asset('shop/vegetables')); ?>" style="color:green">Vegetables</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="<?php echo e(asset('shop/meat')); ?>" style="color: green">Meat</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="<?php echo e(asset('shop/seafood')); ?>" style="color: green">SeaFood</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="<?php echo e(asset('shop/fruit')); ?>" style="color: green">Fruit</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="<?php echo e(asset('shop/cannerfood')); ?>" style="color:green">Canner Food</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="<?php echo e(asset('shop/drinks')); ?>" style="color:green">Drinks</a></h4>
                            </div>
                        </div>
                    </div><!--/category-productsr-->       
                </div>
            </div>
            
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center" style="color: red">Product Item List</h2>

                  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="<?php echo e(asset('images/product-details/'.$item->Image_Name)); ?>" alt="" style="height: 200px"/>
                                <h2 style="color: green"><?php echo e($item->FoodName); ?></h2>
                                <p style="color: red"><?php echo e($item->Price); ?> đ</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2  style="color: green"><span id="price-<?php echo e($item->id); ?>"><?php echo e($item->Price); ?></span><span> đ</span></h2>
                                    
                                    <p><?php echo e($item->FoodName); ?></p>
                                    <input type="text" id="sl-<?php echo e($item->id); ?>" value="1" required>
                                    <button  class="btn btn-default add-to-cart" data-name="<?php echo e($item->FoodName); ?>" data-id="<?php echo e($item->id); ?>"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                </div>
                            </div>
                        </div>
                        <div class="choose">
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="<?php echo e(asset('/detail?id='.$item->id)); ?>"><i class="fa fa-plus-square"></i>Detail</a></li>
                                <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                    <div>
                        <?php echo $data->links(); ?>

                    </div>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
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
           
            $.get("<?php echo e(URL::asset('addtocart')); ?>", {name:name, id:id, sl:soluong, price:price},  
                function (data) {
                    alert('You have successfully added the product to your cart');    
                }
            );
            

            
            
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout_web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foodorder\resources\views/Web/Shop.blade.php ENDPATH**/ ?>