<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	

	<link rel="stylesheet" href="{{ asset('asset/vendor/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{asset('asset/vendor/owl.carousel/dist/assets/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('asset/dist/css/bootstrap.min.css') }}">
</head>




<body>
	
	<header>

		<nav class="navbar navbar-inverse">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle x collapsed" data-toggle="collapse" data-target="#navbar-collapse-x">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#"><img src="{{ asset('/asset/img/logo.png') }}" alt="logo"></a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="navbar-collapse-x">
					<div class="menu-line">
						<ul class="nav navbar-nav navbar-right top-menu">
							<li><a href="#">О проекте</a></li>
							<li><a href="#">Контакты</a></li>
						</ul>
					</div>
					<div class="menu-line text-center">


						<ul class="nav navbar-nav main-nav">
							<li class="active"><a href="http://google.com.ua" target="_blank">Публикации</a></li>
							<li><a href="#">Интервью</a></li>
							<li><a href="#">Колонки</a></li>
							<li><a href="#">Новости</a></li>
							<li><a href="#">Видео</a></li>
						</ul>

						<ul class="nav navbar-nav navbar-right main-nav-right">
							<li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
							<li><a href="#">Войти</a></li>
						</ul>
					</div>
					
					

				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>

	</header>



	@yield('page')
	


	<script src="{{asset('asset/vendor/jquery/dist/jquery.min.js')}}"></script>
	<script src="{{asset('asset/libs/pace/pace.min.js') }}"></script>
	<script src="{{asset('asset/vendor/owl.carousel/dist/owl.carousel.min.js') }}"></script>
	<script src="{{asset('asset/vendor/bootstrap-sass/assets/javascripts/bootstrap.min.js')}}"></script>



	<!-- Latest compiled and minified JavaScript -->
	<script>
		$(document).ready(function(){
			$('.owl-carousel-home').owlCarousel({
				loop:false,
				margin:0,
				//navText: ['',''],
				nav:false,
				dots: false,
				responsive:{
					0:{
						items:1
					},
					600:{
						items:1
					},
					1000:{
						items:1
					}
				}
			});

			var owl = $('.owl-carousel-home');
			owl.owlCarousel();

			$('.customNextBtn').click(function() {
				owl.trigger('next.owl.carousel');
			});

			$('.customPrevBtn').click(function() {
				owl.trigger('prev.owl.carousel', [300]);
			});

			var equalizeColumns = function(selector) {
				var maxDisplayPoint = 959;
				var columns = $(selector);
				var maxHeight = 0;
				if($(window).width() >= maxDisplayPoint)
				{
					columns.each(function(){
						$(this).height('auto');
					});
					columns.each(function(){
						var curentHeight = $(this).height();

						if(curentHeight > maxHeight){
							maxHeight = curentHeight;
						}

					});

					$(selector).height(maxHeight);
				}
				else
				{
					columns.css('height','auto');
				}
			}

			$(function(){
				var selector = '.equal-block';
				setTimeout(function(){
					equalizeColumns(selector);
				}, 50);

				$(window).on('resize', function(){
					equalizeColumns(selector);
				});

			});
			
		});
	</script>


</body>
</html>
