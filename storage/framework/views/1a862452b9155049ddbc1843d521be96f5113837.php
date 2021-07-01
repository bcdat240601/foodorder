<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | GreenFood</title>
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?> " rel="stylesheet">
    <link href="<?php echo e(asset('css/font-awesome.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/prettyPhoto.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/price-range.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/animate.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('css/main.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('css/responsive.css')); ?>" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="<?php echo e(asset('images/ico/favicon.ico')); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo e(asset('images/ico/apple-touch-icon-144-precomposed.png')); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo e(asset('images/ico/apple-touch-icon-114-precomposed.png')); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo e(asset('images/ico/apple-touch-icon-72-precomposed.png')); ?>">
    <link rel="apple-touch-icon-precomposed" href="<?php echo e(asset('images/ico/apple-touch-icon-57-precomposed.png')); ?>">

</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#" style="color:red"><i class="fa fa-phone"></i> 0938800837</a></li>
								<li><a href="#" style="color: red"><i class="fa fa-envelope"></i> anhkiettmail2@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-facebook"></i></a></li>								
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
							<a href="<?php echo e(asset('home')); ?>"><img src="<?php echo e(asset('images/home/logo5.png')); ?>" alt="" /></a>
						</div>
					</div>
					<div class="col-md-8 clearfix">
						<div class="shop-menu clearfix pull-right">
							<ul class="nav navbar-nav">
								<?php if(auth()->guard()->guest()): ?>
									<li><a href="<?php echo e(asset('login')); ?>" style="color: red"><i class="fa fa-lock"></i> Login</a></li>
								<?php endif; ?>
								<?php if(auth()->guard()->check()): ?>
									<li><a href="<?php echo e(asset('logout')); ?>" style="color:green"><i class="fa fa-lock"></i> Logout</a></li><br>
									<br><li>Hello!! <?php echo e(Auth::user()->CustomerName); ?></li>
								<?php endif; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="<?php echo e(asset('home')); ?>" class="active" style="color: green">Home</a></li>
								<li class="dropdown"><a href="#" style="color: green">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
										<li><a href="<?php echo e(asset('shop/freshfood')); ?>">Fresh Food</a></li>
										<li><a href="<?php echo e(asset('shop/vegetables')); ?>">Vegetables</a></li>
										<li><a href="<?php echo e(asset('shop/meat')); ?>">Meat</a></li>
										<li><a href="<?php echo e(asset('shop/seafood')); ?>">Sea Food</a></li> 
										<li><a href="<?php echo e(asset('shop/fruit')); ?>">Fruit</a></li> 
										<li><a href="<?php echo e(asset('shop/cannerfood')); ?>">Canner Food</a></li> 
										<li><a href="<?php echo e(asset('shop/drinks')); ?>">Drinks</a></li> 
                                    </ul>
                                </li> 
								<li><a href="<?php echo e(asset('Introduce')); ?>" style="color: green">Introduce</a></li>								
								<li><a href="<?php echo e(asset('Contact')); ?>" style="color: green">Contact</a></li>
								<li><a href="<?php echo e(asset('checkout')); ?>" style="color: green">Checkout</a></li>
								<li><a href="<?php echo e(asset('cart')); ?>" style="color: green">Cart</a></li>
								<li><a href="" style="color: green">Wishlist</a></li>
								<li><a href="" style="color: green">Account</a></li>
								<?php if(session('login') == 0): ?>
									<li><a href="<?php echo e(asset('/Customer/AddCustomer')); ?>" style="color: blue">Sign-Up</a></li>
								<?php endif; ?>
							</ul>
						</div>
					</div>
					
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	<?php echo $__env->yieldContent('content'); ?>
	
	<footer id="footer"><!--Footer-->
		
		
		<div class="footer-widget" style="background-color: white">
			<div class="container" style="background-color: white">
				<div class="row">
					<div class="col-sm-2" >
						<div class="single-widget">
							<h2 style="color:green">About US</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">anhkiettmail2@gmail.com</li>
								<li><a href="#">0938800837</a></li>
								<li><a href="https://www.google.com/maps/place/330%2F18%2F16+%C3%82u+D%C6%B0%C6%A1ng+L%C3%A2n,+Ph%C6%B0%E1%BB%9Dng+3,+Qu%E1%BA%ADn+8,+Th%C3%A0nh+ph%E1%BB%91+H%E1%BB%93+Ch%C3%AD+Minh,+Vi%E1%BB%87t+Nam/@10.7414513,106.6823523,17z/data=!3m1!4b1!4m5!3m4!1s0x31752fa92e5cc45b:0xe9557c961eaa867a!8m2!3d10.741446!4d106.684541?hl=vi-VN">330/18/16B Âu Dương Lân, Phường 3, Quận 8</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2 style="color:green">Quick help</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="<?php echo e(asset('PaymentGuide')); ?>">Payment Guide</a></li>
								<li><a href="<?php echo e(asset('Shoppingguide')); ?>">Shopping Guide</a></li>
								<li><a href="#">0753869006</a></li>								
							</ul>
						</div>
					</div>
					<div class="col-sm-2" >
						<div class="single-widget">
							<h2 style="color:green">Purchase Policy</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="<?php echo e(asset('ReturnPolicy')); ?>">Goods return Policy</a></li>
								<li><a href="<?php echo e(asset('ShippingPolicy')); ?>">Shipping Policy</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2" >
						<div class="single-widget">
							<h2 style="color:green">Privacy Policy</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="<?php echo e(asset('GeneralPolicy')); ?>">General Policies and Regulations</a></li>
								<li><a href="<?php echo e(asset('InformationPrivacy')); ?>">Information privacy policy</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2" >
						<div class="single-widget">
							<h2 style="color:green">Quick link</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="<?php echo e(asset('home')); ?>">Home</a></li>
								<li><a href="<?php echo e(asset('Introduce')); ?>">Introduce</a></li>
								<li><a href="<?php echo e(asset('Contact')); ?>">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2 style="color:green">Community</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Facebook</a></li>
								<li><a href="">Youtube</a></li>
								<li><a href="">Instagram</a></li>
							</ul>
						</div>
					</div>	
				</div>
			</div>
		</div>
		
		<div class="footer-bottom" style="background-color:white">
			<div class="container" style="background-color: white">
				<div class="row" >
					<p class="pull-left" style="color: red">Thai Hoang Anh Kiet | GreenWichschool | 2021</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="https://www.facebook.com/thai.kiet.58" style="color: green">Thai Hoang Anh Kiet</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="<?php echo e(asset('js/jquery.js')); ?>"></script>   
	<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/jquery.scrollUp.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/price-range.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.prettyPhoto.js')); ?>"></script>
    <script src="<?php echo e(asset('js/main.js')); ?>"></script>
	<?php echo $__env->yieldContent('scripts'); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\foodorder\resources\views/layout_Web.blade.php ENDPATH**/ ?>