<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | GreenFood</title>
    <link href="{{ asset('css/bootstrap.min.css') }} " rel="stylesheet">
	{{-- <link href="{{ asset('css/bootstrap.css') }} " rel="stylesheet"> --}}
	<link href="{{asset('css/css.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
	<link href="{{asset('css/all.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{ asset('css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{ asset('images/ico/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('images/ico/apple-touch-icon-57-precomposed.png') }}">	
</head><!--/head-->
<style>
	.category-products .panel-default .panel-heading h4 a{
		color: green;
	}
	.mainmenu ul li a{
		color: green;
	}
	.mainmenu ul li a:hover{
		color: #F56960;
	}
	#login{
		color: red;
	}
	#logout{
		color:green;
	}
	#admin{
		color: #1AC8ED;
	}
	#login:hover{
		color:blue;
	}
	#logout:hover{
		color: blue;
	}
	#admin:hover{
		color:yellow;
	}
</style>
<body id="body">
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#" style="color:#003049"><i class="fa fa-phone"></i> 0123456789</a></li>
								<li><a href="#" style="color: #003049"><i class="fa fa-envelope"></i> chuong@gmail.com</a></li>
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
							<a href="{{ asset('home') }}"><img src="{{ asset('images/home/logo5.png') }}" alt="" /></a>
						</div>
					</div>
					<!-- Search Form -->
					<div class="search-top">
						<div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
						<!-- Search Form -->
						<div class="search-top">							
							<form action="{{ route('search') }}" method="get" class="search-form col-md-8 clearfix input-group">
								<input type="text" placeholder="Search here..." name="search" class="ip-search">
								<div class="input-group-append">
                                <button class=" btns"value="search" type="submit">
									<i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            	</div>
								<div id="hint"></div>
								{{ csrf_field() }}
							</form>
						</div>
						<!--/ End Search Form -->
					</div>
					<!--/ End Search Form -->
					<div class="col-md-8 clearfix">
						<div class="shop-menu clearfix pull-right">
							<ul class="nav navbar-nav">
								@guest
									<li><a id="login" href="{{ asset('login')}}" ><i class="fa fa-lock"></i> Login</a></li>
								@endguest
								@auth
									<li><a id="logout" href="{{ asset('logout')}}" ><i class="fa fa-lock"></i> Logout</a></li><br>
									<br><li><span style="color: #F56960;">Hello!! {{Auth::user()->CustomerName}}</span><span> </span><img class="img-profile rounded-circle"
										src="{{ asset('img/undraw_profile.svg') }}" style="height: 4rem;"></li><br>
								@endauth
								<li><a id="admin" href="{{ asset('admin/')}}"><i class="fa fa-user"></i>Admin</a></li><br>
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
								<li><a href="{{ asset('home') }}" class="active">Home</a></li>
								<li class="dropdown"><a href="#" >Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
										@foreach ($category as $item)
											<li><a href="{{ asset('shop?id='.$item->id) }}">{{$item->CatagoryName}}</a></li>										
										@endforeach
                                    </ul>
                                </li> 
								<li><a href="{{ asset('Introduce')}}" >Introduce</a></li>								
								<li><a href="{{ asset('Contact')}}" >Contact</a></li>
								{{-- <li><a href="{{ asset('checkout')}}" style="color: green">Checkout</a></li> --}}
								<li><a href="{{ asset('cart')}}" >Cart</a></li>
								@if (session()->has('idkh'))
								<li><a href="{{ asset('wishlist') }}" >Wishlist</a></li>
								@endif
								@if (session('login') == 1)
									<li><a href="{{ asset('myprofile') }}" >Account</a></li>
								@endif
								@if (session('login') == 0)
									<li><a href="{{ asset('/Customer/AddCustomer')}}" style="color: blue">Sign-Up</a></li>
								@endif
							</ul>
						</div>
					</div>
					
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	@yield('content')
	
	<footer id="footer"><!--Footer-->
		
		
		<div class="footer-widget" style="background-color: #002a32;line-height: 3.428571;">
			<div class="container" style="background-color: #002a32">
				<div class="row">
					<div class="col-sm-2" >
						<div class="single-widget">
							<h2 style="color:white">About US</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">chuong@gmail.com</li>
								<li><a href="#">0123456789</a></li>
								<li><a href="https://www.google.com/maps/place/330%2F18%2F16+%C3%82u+D%C6%B0%C6%A1ng+L%C3%A2n,+Ph%C6%B0%E1%BB%9Dng+3,+Qu%E1%BA%ADn+8,+Th%C3%A0nh+ph%E1%BB%91+H%E1%BB%93+Ch%C3%AD+Minh,+Vi%E1%BB%87t+Nam/@10.7414513,106.6823523,17z/data=!3m1!4b1!4m5!3m4!1s0x31752fa92e5cc45b:0xe9557c961eaa867a!8m2!3d10.741446!4d106.684541?hl=vi-VN">330/18/16B Âu Dương Lân, Phường 3, Quận 8</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2 style="color:white">Quick help</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="{{ asset('PaymentGuide')}}">Payment Guide</a></li>
								<li><a href="{{ asset('Shoppingguide')}}">Shopping Guide</a></li>
								<li><a href="#">0123456789</a></li>								
							</ul>
						</div>
					</div>
					<div class="col-sm-2" >
						<div class="single-widget">
							<h2 style="color:white">Purchase Policy</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="{{ asset('ReturnPolicy')}}">Goods return Policy</a></li>
								<li><a href="{{ asset('ShippingPolicy')}}">Shipping Policy</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2" >
						<div class="single-widget">
							<h2 style="color:white">Privacy Policy</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="{{ asset('GeneralPolicy')}}">General Policies and Regulations</a></li>
								<li><a href="{{ asset('InformationPrivacy') }}">Information privacy policy</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2" >
						<div class="single-widget">
							<h2 style="color:white">Quick link</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="{{ asset('home') }}">Home</a></li>
								<li><a href="{{ asset('Introduce') }}">Introduce</a></li>
								<li><a href="{{ asset('Contact') }}">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2 style="color:white">Community</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a >Facebook <i class="fa fa-facebook"></i> </a></li>
								<li><a >Youtube <i class="fa fa-youtube-play"></i></a></li>
								<li><a >Twitter <i class="fa fa-twitter"></i></a></li>
							</ul>
						</div>
					</div>	
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom" style="background-color:white">
			<div class="container" style="background-color: white">
				<!-- <div class="row" >
					<p class="pull-left" style="color: red">Nguyen | GreenWichschool | 2021</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="https://www.facebook.com/thai.kiet.58" style="color: green">Thai Hoang Anh Kiet</a></span></p>
				</div> -->
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="{{ asset('js/jquery.js') }}"></script>   
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
	<script src="{{ asset('js/price-range.js') }}"></script>
    <script src="{{ asset('js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
	<script>
		$('.ip-search').keyup(function () {			 
			var gethint = $(this).val();
			if(gethint != null){
				$.post('hint',{"_token": "{{ csrf_token() }}",gethint:gethint},function(data){
					if(gethint != null){
						$('#hint').fadeIn();
						$('#hint').html(data);
					}
				});
			}
		});		
		$('.ip-search').focus(function () { 
			var gethint = $(this).val();
			if(gethint != null){
				$.post('hint',{"_token": "{{ csrf_token() }}",gethint:gethint},function(data){
					if(gethint != null){
						$('#hint').fadeIn();
						$('#hint').html(data);
					}
				});
			}	
		});
		$('#body').click(function (e) { 							
			$('#hint').css('display', 'none');
		});		
	</script>
	@yield('scripts')
</body>
</html>