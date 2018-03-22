@extends('templates.layout')

@section('page')
<div class="container">

	<div class="row">
		<div class="home-blocks-wrapp xs-mt-30">
			<div class="col-sm-7 sm-padd-right-zero">
				<a href="#" class="home-block">
					<img src="{{ asset('/asset/img/homebl.jpg') }}">
					<div class="home-block__descr">
						<span class="btn btn-warning home-block-btn">новини</span>
						<h2 class="home-block__title">Україна очолила рейтинг боротьби з корупцією</h2>
						<p class="home-block-date"><time>20.05.2018</time></p>
					</div>
				</a>
			</div>
			<div class="col-sm-5">
				<a href="#" class="home-block home-block-small">
					<img src="{{ asset('/asset/img/homebl.jpg') }}">
					<div class="home-block__descr">
						<span class="btn btn-warning home-block-btn">новини</span>
						<h2 class="home-block__title">Україна очолила рейтинг боротьби з корупцією</h2>
						<p class="home-block-date"><time>20.05.2018</time></p>
					</div>
				</a>
				<a href="#" class="home-block home-block-small xs-mt-10">
					<img src="{{ asset('/asset/img/homebl.jpg') }}">
					<div class="home-block__descr">
						<span class="btn btn-warning home-block-btn">новини</span>
						<h2 class="home-block__title">Україна очолила рейтинг боротьби з корупцією</h2>
						<p class="home-block-date"><time>20.05.2018</time></p>
					</div>
				</a>
			</div>
		</div>
	</div>	
	
	<div class="square-blocks-wrapp md-mt-30">
		<a href="#" class="square-block">
			<img src="{{ asset('/asset/img/shape-1.png') }}" alt="img1">
			<p class="square-block__title">Контроль за діяльністю за НАБУ</p>
		</a>
		<a href="#" class="square-block">
			<img src="{{ asset('/asset/img/shape-2.png') }}" alt="img1">
			<p class="square-block__title">Контроль за діяльністю за НАБУ</p>
		</a>
		<a href="#" class="square-block">
			<img src="{{ asset('/asset/img/shape-3.png') }}" alt="img1">
			<p class="square-block__title">Контроль за діяльністю за НАБУ</p>
		</a>
	</div>
	
	<div class="row xs-mt-30 xs-mb-30 sm-mb-70 md-mb-90 md-mt-40">

		<div class="col-md-8">
			<div class="title-wrapp title-left xs-mb-20">
				<h1 class="section-title">Новини</h1>
			</div>
			<div class="home-news">
				<a href="#" class="news-item">
					<div class="row">
						<div class="col-md-5 col-lg-4">
							<div class="news-item__img-wrapp">
								<img src="{{ asset('/asset/img/news/item1.jpg') }}">
							</div>
						</div>
						<div class="col-md-7 col-lg-8">
							<div class="news-item__description xs-mt-20 md-mt-0">
								<h2 class="news-item__description_title ">Розпорядження N145-р від 25 січня 2018 року</h2>
								<p class="author">Автор:<object><a href="http://google.com.ua" target="_blank" class="author-name">Маша Кривоніс</a></object> - <span><time class="item-time">14.45</time></span></p>
								<p class="news-item-description_text">Розпорядженням Директора Національного антикорупційного бюро України від 25 січня 2018 року N145-р оголошено конкурс на зайняття вакантної посади в Національному антикорупційному бюро України (далі – Національне бюро).</p>
								<span class="btn btn-lg has-arrow-right btn-transparent">Читати більше<i class="fa fa-long-arrow-right"></i></span>
							</div>
						</div>
					</div>
				</a>
				<a href="#" class="news-item">
					<div class="row">
						<div class="col-md-5 col-lg-4">
							<div class="news-item__img-wrapp">
								<img src="{{ asset('/asset/img/news/item1.jpg') }}">
							</div>
						</div>
						<div class="col-md-7 col-lg-8">
							<div class="news-item__description xs-mt-20 md-mt-0">
								<h2 class="news-item__description_title ">Розпорядження N145-р від 25 січня 2018 року</h2>
								<p class="author">Автор:<object><a href="http://google.com.ua" target="_blank" class="author-name">Маша Кривоніс</a></object> - <span><time class="item-time">14.45</time></span></p>
								<p class="news-item-description_text">Розпорядженням Директора Національного антикорупційного бюро України від 25 січня 2018 року N145-р оголошено конкурс на зайняття вакантної посади в Національному антикорупційному бюро України (далі – Національне бюро).</p>
								<span class="btn btn-lg has-arrow-right btn-transparent">Читати більше<i class="fa fa-long-arrow-right"></i></span>
							</div>
						</div>
					</div>
				</a>
				<a href="#" class="news-item">
					<div class="row">
						<div class="col-md-5 col-lg-4">
							<div class="news-item__img-wrapp">
								<img src="{{ asset('/asset/img/news/item1.jpg') }}">
							</div>
						</div>
						<div class="col-md-7 col-lg-8">
							<div class="news-item__description xs-mt-20 md-mt-0">
								<h2 class="news-item__description_title ">Розпорядження N145-р від 25 січня 2018 року</h2>
								<p class="author">Автор:<object><a href="http://google.com.ua" target="_blank" class="author-name">Маша Кривоніс</a></object> - <span><time class="item-time">14.45</time></span></p>
								<p class="news-item-description_text">Розпорядженням Директора Національного антикорупційного бюро України від 25 січня 2018 року N145-р оголошено конкурс на зайняття вакантної посади в Національному антикорупційному бюро України (далі – Національне бюро).</p>
								<span class="btn btn-lg has-arrow-right btn-transparent">Читати більше<i class="fa fa-long-arrow-right"></i></span>
							</div>
						</div>
					</div>
				</a>
				<a href="#" class="news-item">
					<div class="row">
						<div class="col-md-5 col-lg-4">
							<div class="news-item__img-wrapp">
								<img src="{{ asset('/asset/img/news/item1.jpg') }}">
							</div>
						</div>
						<div class="col-md-7 col-lg-8">
							<div class="news-item__description xs-mt-20 md-mt-0">
								<h2 class="news-item__description_title ">Розпорядження N145-р від 25 січня 2018 року</h2>
								<p class="author">Автор:<object><a href="http://google.com.ua" target="_blank" class="author-name">Маша Кривоніс</a></object> - <span><time class="item-time">14.45</time></span></p>
								<p class="news-item-description_text">Розпорядженням Директора Національного антикорупційного бюро України від 25 січня 2018 року N145-р оголошено конкурс на зайняття вакантної посади в Національному антикорупційному бюро України (далі – Національне бюро).</p>
								<span class="btn btn-lg has-arrow-right btn-transparent">Читати більше<i class="fa fa-long-arrow-right"></i></span>
							</div>
						</div>
					</div>
				</a>
			</div>
			<a href="#" class="btn btn-warning btn-block home-btn-transp xs-mt-20">Всі новини та блоги</a>
		</div>

		<div class="col-md-4 xs-mt-40 md-mt-0">
			<div class="title-wrapp title-left xs-mb-20">
				<h1 class="section-title">Події</h1>
			</div>
			
			<div class="home-sidebar__wrapp">
					
				<div class="home-sidebar__items_wrapp">
					
					<a href="#" class="home-sidebar__item">
						<img class="hidden-xs hidden-sm" src="{{ asset('/asset/img/homebl.jpg') }}" alt="imgg">
						<div class="row">
							<div class="col-xs-4">
								<div class="home-sidebar__item_date_wrapp">
									<p class="home-sidebar__item_date">08</p>
									<p class="home-sidebar__item_date">листопада</p>
									<p class="home-sidebar__item_date">Початок о <time>16.00</time></p>
								</div>
							</div>
							<div class="col-xs-8 padd-left-zero">
								<div class="home-sidebar__item_descr">
									<p class="home-sidebar__item_descr_text">Загальна зустріч з Остапом Семераком, Міністром екології та природних ресурсів України</p>
									<span class="btn btn-lg has-arrow-right btn-transparent btn-blue">детальніше <i class="fa fa-long-arrow-right"></i></span>
								</div>
							</div>
						</div>
					</a>

					<a href="#" class="home-sidebar__item">
						<div class="row">
							<div class="col-xs-4">
								<div class="home-sidebar__item_date_wrapp">
									<p class="home-sidebar__item_date">08</p>
									<p class="home-sidebar__item_date">листопада</p>
									<p class="home-sidebar__item_date">Початок о <time>16.00</time></p>
								</div>
							</div>
							<div class="col-xs-8 padd-left-zero">
								<div class="home-sidebar__item_descr">
									<p class="home-sidebar__item_descr_text">Загальна зустріч</p>
									<span class="btn btn-lg has-arrow-right btn-transparent btn-blue">детальніше <i class="fa fa-long-arrow-right"></i></span>
								</div>
							</div>
						</div>
					</a>
					
					<a href="#" class="home-sidebar__item">
						<div class="row">
							<div class="col-xs-4">
								<div class="home-sidebar__item_date_wrapp">
									<p class="home-sidebar__item_date">08</p>
									<p class="home-sidebar__item_date">листопада</p>
									<p class="home-sidebar__item_date">Початок о <time>16.00</time></p>
								</div>
							</div>
							<div class="col-xs-8 padd-left-zero">
								<div class="home-sidebar__item_descr">
									<p class="home-sidebar__item_descr_text">Загальна зустріч з Остапом Семераком</p>
									<span class="btn btn-lg has-arrow-right btn-transparent btn-blue">детальніше <i class="fa fa-long-arrow-right"></i></span>
								</div>
							</div>
						</div>
					</a>

					
				</div>
			</div>
			<a href="#" class="btn btn-warning btn-block home-btn-transp xs-mt-20">Всі події</a>
		</div>
	</div>


</div>
@endsection
