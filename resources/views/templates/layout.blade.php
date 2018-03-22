<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	

	<link rel="stylesheet" href="{{ asset('asset/vendor/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('asset/vendor/jssocials/dist/jssocials.css') }}">
	<link rel="stylesheet" href="{{ asset('asset/vendor/jssocials/dist/jssocials-theme-flat.css') }}">
	<link rel="stylesheet" href="{{ asset('asset/vendor/select2/dist/css/select2.min.css') }}">
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
	

	<footer class="main-footer">
		<div class="subscribe fail hidden">
			<p>Підписка пройшла успішно</p>
		</div>
		
		<div class="main-footer__top">

			<div class="container">
				<div class="row">
					
					<div class="col-md-2">
						<div class="main-footer__logo">
							<img src="{{ asset('/asset/img/logo.png') }}" alt="logo">
						</div>
					</div>
					
					<div class="col-md-7">
						<ul class="main-footer__nav">
							<li class="active"><a href="http://google.com.ua" target="_blank">Новини</a></li>
							<li><a href="#">Діяльність РГК</a></li>
							<li><a href="#">Команда</a></li>
							<li><a href="#">Суди</a></li>
							<li><a href="#">Контакти</a></li>
							<li><a href="#">Партнери</a></li>
						</ul>
					</div>
					
					<div class="col-md-3 text-center">
						<div class="main-footer__form">
							<p>Підписка</p>
							<div class="input-group main-footer__input">
								<input type="email" class="form-control" placeholder="ваш email...">
								<span class="input-group-btn">
									<button class="btn btn-default main-footer-input__btn" type="button"><i class="fa fa-long-arrow-right"></i></button>
								</span>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<div class="main-footer__bottom">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<a href="https://runsite.com.ua/uk" class="developer">Розробка та підтримка сайту: <span><b>ТОВ Рансайт</b></span></a>
				</div>
				<div class="col-sm-6">
					<ul class="footer-social">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

</footer>



<script src="{{asset('asset/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{ asset('asset/libs/pace/pace.min.js') }}"></script>
<script src="{{asset('asset/vendor/bootstrap-sass/assets/javascripts/bootstrap.min.js')}}"></script>



<!-- Latest compiled and minified JavaScript -->
<script>
	
</script>


</body>
</html>
