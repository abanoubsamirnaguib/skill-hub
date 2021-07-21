<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>@yield("title",'HTML Education Template')</title>
	{{-- <title>HTML Education Template</title> --}}

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href={{ asset('assets/css/style.css') }}>


	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		@yield('link')
</head>

<body>

	<!-- Header -->
	<header id="header">
		<div class="container">

			<div class="navbar-header">
				<!-- Logo -->
				<div class="navbar-brand">
					<a class="logo" href="index.html">
						<img src="{{ asset('assets/img/logo.png') }}" alt="logo">
					</a>
				</div>
				<!-- /Logo -->

				<!-- Mobile toggle -->
				<button class="navbar-toggle">
					<span></span>
				</button>
				<!-- /Mobile toggle -->
			</div>


			{{-- <x-navComponent></x-navComponent> --}}
			<!-- Navigation -->
			{{-- <nav id="nav">
				<ul class="main-menu nav navbar-nav navbar-right">
					<li><a href="{{ url('/SkillsHub/home', []) }}">Home</a></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
					aria-expanded="false">Categories <span class="caret"></span></a>
				<ul class="dropdown-menu">
					@foreach ($cats as $cat)
					<li><a href="#">{{$cat->name}}</a></li>
					@endforeach
					<li><a href="#">Programming</a></li>
					<li><a href="#">Design</a></li>
					<li><a href="#">Management</a></li>
				</ul>
			</li>
			<li><a href="{{ url('/SkillsHub/contact', []) }} ">Contact</a></li>

			@if (!Auth::user())
			<li><a href="{{ url('/SkillsHub/login', []) }}">Sign In</a></li>
			<li><a href="{{ url('/SkillsHub/register', []) }}">Sign Up</a></li>
			@endif

			@if(Auth::user())
			<li><a href="{{ url('/SkillsHub/logout', []) }}">logOut</a></li>
			@endif

			</ul>
			</nav> --}}
			<!-- /Navigation -->

		</div>
	</header>
	<!-- /Header -->


	<!-- Home -->
	@section('header')

	{{-- <div id="home" class="hero-area">
			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" style="background-image:url({{ asset('assets/img/home-background.jpg') }})">
	</div>
	<!-- /Backgound Image --> --}}


	{{-- <div class="home-wrapper">
				<div class="container">
					<div class="row">
						<div class="col-md-8">
							<h1 class="white-text">SkillsHub Free Online Skill Assessment</h1>
							<p class="lead white-text">Libris vivendo eloquentiam ex ius, nec id splendide abhorreant, eu pro alii error homero.</p>
							<a class="main-button icon-button" href="#">Get Started!</a>
						</div>
					</div>
				</div>
			</div> --}}

	{{-- </div> --}}
	<!-- /Home -->
	@show

	@section('contents')



	@show

	@section('footer')
	<x-footerComponent></x-footerComponent>
	@show
	<!-- preloader -->
	<div id='preloader'>
		<div class='preloader'></div>
	</div>
	<!-- /preloader -->


	<!-- jQuery Plugins -->
	<script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        

 @yield('script')
	 
</body>

</html>