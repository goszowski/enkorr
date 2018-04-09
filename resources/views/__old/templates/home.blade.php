@extends('templates.layout')

@section('page')

<div class="container-fluid grey-bg xs-pb-30 xs-pt-20">
	<div class="container">

		<div class="row">

			<div class="home-last-news">
				<div class="col-md-6">
					<a href="#" class="last-news__big">
						<img src="{{ asset('/asset/img/home/gaz1.png') }}" alt="news1">
						<div class="last-news__big_description">
							<h2 class="last-news__big_descr_title text-uppercase">Цены на СУГ приблизились до абсолютного максимума</h2>
							<p class="last-news__big_descr_text">С начала недели автомобильные партии сжиженного газа подорожали на 1 550 грн/т, до 22 240 грн/т. Об этом OilNews рассказали в «Консалтинговой группе А-95» по итогам ежедневного мониторинга цен на оптовом рынке <span class="load">...</span></p>
						</div>
					</a>
				</div>
				<div class="col-md-6 xs-mt-30 md-pl-10 md-mt-0">
					<div class="block-title">
						<h2 class="block-title_text">Последние новости</h2>
					</div>
					<div class="last-news-items-wrapp">
						<a href="#" class="last-news_item">
							<p class="last-news_item_text">Россия хочет обязать белорусские НПЗ экспортировать нефтепродукты через свои порты <span class="load">...</span></p>
							<span class="last-news-item_time"><time>16.25</time></span>
						</a>
						<a href="#" class="last-news_item">
							<p class="last-news_item_text">Россия хочет обязать белорусские НПЗ экспортировать нефтепродукты через свои порты <span class="load">...</span></p>
							<span class="last-news-item_time"><time>16.25</time></span>
						</a>
						<a href="#" class="last-news_item">
							<p class="last-news_item_text">Россия хочет обязать белорусские НПЗ экспортировать нефтепродукты через свои порты <span class="load">...</span></p>
							<span class="last-news-item_time"><time>16.25</time></span>
						</a>
						<a href="#" class="last-news_item">
							<p class="last-news_item_text">Россия хочет обязать белорусские НПЗ экспортировать нефтепродукты через свои порты <span class="load">...</span></p>
							<span class="last-news-item_time"><time>16.25</time></span>
						</a>
						<a href="#" class="last-news_item">
							<p class="last-news_item_text">Россия хочет обязать белорусские НПЗ экспортировать нефтепродукты через свои порты <span class="load">...</span></p>
							<span class="last-news-item_time"><time>16.25</time></span>
						</a>
					</div>
					<div class="last-news-btn-wrapp text-center xs-mt-30 sm-mt-40">
						<a href="#" class="btn btn-warning big-btn text-uppercase">Перейти в раздел</a>
					</div>
				</div>
			</div>

		</div>
		<div class="baner-wrapp text-center xs-mt-30 xs-mb-15">
			<img src="{{ asset('/asset/img/banner.png') }}" alt="news1">
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-4">
			
			<div class="equal-block">
				<div class="block-title">
					<h2 class="block-title_text">Главные новости</h2>
				</div>
				<div class="equal-block_content">
					<a href="#" class="main-news_item">
						<p class="main-news_item__text">Компания из орбиты «Трейд Коммодити» пытается растаможить 17 тыс. т нефтепродуктов без уплаты акциза?</p>
					</a>
					<a href="#" class="main-news_item">
						<p class="main-news_item__text">Компания из орбиты «Трейд Коммодити» пытается растаможить 17 тыс. т нефтепродуктов без уплаты акциза?</p>
					</a>
					<a href="#" class="main-news_item">
						<p class="main-news_item__text">Компания из орбиты «Трейд Коммодити» пытается растаможить 17 тыс. т нефтепродуктов без уплаты акциза?</p>
					</a>
				</div>
			</div>

			<div class="btn-wrapp text-center xs-mt-20">
				<a href="#" class="btn btn-default big-btn black-border text-uppercase bold">Перейти в раздел</a>
			</div>

		</div>
		<div class="col-md-4">
			<div class="equal-block">
				<div class="block-title">
					<h2 class="block-title_text has-rs-icon">Публикации</h2>
				</div>

				<div class="equal-block_content">
					<a href="#" class="publication-item">
						<img src="{{ asset('/asset/img/home/gaz1.png') }}">
						<p class="publication-item_text">Батарейки, нефть и Украина</p>
					</a>
					<a href="#" class="publication-item">
						<p class="publication-item_text">Стоп-кран для формулы цены</p>
					</a>
					<a href="#" class="publication-item">
						<p class="publication-item_text">Батарейки, нефть и Украина</p>
					</a>
					<a href="#" class="publication-item">
						<p class="publication-item_text">Стоп-кран для формулы цены</p>
					</a>
				</div>
			</div>
			<div class="btn-wrapp text-center xs-mt-20">
				<a href="#" class="btn btn-default big-btn black-border text-uppercase bold">Перейти в раздел</a>
			</div>
		</div>
		<div class="col-md-4">
			<div class="equal-block bg-warning xs-mt-20 md-mt-0 xs-pl-10 xs-pr-10">
				<div class="block-title white-title">
					<h2 class="block-title_text">Интервью</h2>
				</div>
				<div class="equal-block_content">
					<div class="owl-carousel owl-carousel-home">
						<a href="#" class="home-carousel_item">
							<div class="home-carousel_item__img">
								<img src="{{ asset('/asset/img/home/gaz1.png') }}">
							</div>
							<div class="home-carousel_item__descr">
								<p class="xs-mt-5">Игорь Щуцкий</p>
								<p>«Карпатнефтехим» через полтора месяца выйдет на 98% мощности</p>
							</div>
						</a>
						<a href="#" class="home-carousel_item">
							<div class="home-carousel_item__img">
								<img src="{{ asset('/asset/img/home/gaz1.png') }}">
							</div>
							<div class="home-carousel_item__descr">
								<p class="xs-mt-5">Игорь Щуцкий</p>
								<p>Quod, harum. Incidunt sunt laboriosam architecto, exercitationem optio, id culpa assumenda omnis.</p>
							</div>
						</a>
						<a href="#" class="home-carousel_item">
							<div class="home-carousel_item__img">
								<img src="{{ asset('/asset/img/home/gaz1.png') }}">
							</div>
							<div class="home-carousel_item__descr">
								<p class="xs-mt-5">Игорь Щуцкий</p>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, voluptas?</p>
							</div>
						</a>
					</div>

					<div class="cust-nav hidden-xs visible-md visible-lg">
						<div class="nav-wrapp">
							<button href="#" class="customPrevBtn"><i class="fa fa-caret-left" aria-hidden="true"></i></button>
							<button href="#" class="customNextBtn"><i class="fa fa-caret-right" aria-hidden="true"></i></button>
						</div>
					</div>
					
				</div>
				<div class="text-right xs-pb-10 small-logo">
					<img src="{{ asset('/asset/img/small-logo.png') }}">
				</div>
			</div>
			<div class="btn-wrapp text-center xs-mt-20">
				<a href="#" class="btn btn-default big-btn black-border text-uppercase bold">Перейти в раздел</a>
			</div>
		</div>
	</div>
	<div class="baner-wrapp text-center xs-mt-30 xs-mb-15 sm-mb-30">
		<img src="{{ asset('/asset/img/banner.png') }}" alt="news1">
	</div>
</div>

<div class="container-fluid black-bg xs-pt-25 xs-pb-30">
	<div class="container">
		<div class="block-title white-text">
			<h2 class="block-title_text">Колонки</h2>
		</div>
		<div class="row sm-mt-30 xs-pb-15">
			<div class="col-md-4">
				<div class="column-item xs-mt-40 md-mt-20 xs-mb-10">
					<a href="#" class="column-item_author">
						<div class="row">
							<div class="col-md-4">
								<div class="column-item_author__img">
									<img src="{{ asset('/asset/img/1.png') }}" alt="q">
								</div>
							</div>
							<div class="col-md-8">
								<p class="column-item_author__name">Артем Куюн</p>
								<p class="column-item_author__work">Консталтинговая група А-95</p>
							</div>
						</div>
					</a>
					<p class="column-item_date xs-mt-20">8 августа, 17:30</p>
					<a href="#" class="column-item_text">
						<h3 class="column-item_text__title">Новый нокаут от Кличко</h3>
						<p class="column-item_text__descr xs-mt-25">
							– Большие и не очень, газовые и дизельные, ржавые и белые с красной полосой — буквально заполонившие столицу “бочки” имели одну общую особенность: все они были нелегальными <span class="load">...</span>
						</p>
					</a>
				</div>
			</div>

			<div class="col-md-4">
				<div class="column-item xs-mt-40 md-mt-20 xs-mb-10">
					<a href="#" class="column-item_author">
						<div class="row">
							<div class="col-md-4">
								<div class="column-item_author__img">
									<img src="{{ asset('/asset/img/2.png') }}" alt="q">
								</div>
							</div>
							<div class="col-md-8">
								<p class="column-item_author__name">Артем Куюн</p>
								<p class="column-item_author__work">Консталтинговая група А-95</p>
							</div>
						</div>
					</a>
					<p class="column-item_date xs-mt-20">8 августа, 17:30</p>
					<a href="#" class="column-item_text">
						<h3 class="column-item_text__title">Мы горды тем, что смогли помочь городу, в котором родились</h3>
						<p class="column-item_text__descr xs-mt-25">
							– Наша компания была активным участником программы по очистке Киева от нелегальных газовых заправок. Мы горды тем, что смогли помочь городу, в котором родились, живем, работаем и который любим <span class="load">...</span>
						</p>
					</a>
				</div>
			</div>

			<div class="col-md-4">
				<div class="column-item xs-mt-40 md-mt-20 xs-mb-10">
					<a href="#" class="column-item_author">
						<div class="row">
							<div class="col-md-4">
								<div class="column-item_author__img">
									<img src="{{ asset('/asset/img/1.png') }}" alt="q">
								</div>
							</div>
							<div class="col-md-8">
								<p class="column-item_author__name">Артем Куюн</p>
								<p class="column-item_author__work">Консталтинговая група А-95</p>
							</div>
						</div>
					</a>
					<p class="column-item_date xs-mt-20">8 августа, 17:30</p>
					<a href="#" class="column-item_text">
						<h3 class="column-item_text__title">Новый нокаут от Кличко</h3>
						<p class="column-item_text__descr xs-mt-25">
							– Большие и не очень, газовые и дизельные, ржавые и белые с красной полосой — буквально заполонившие столицу “бочки” имели одну общую особенность: все они были нелегальными <span class="load">...</span>
						</p>
					</a>
				</div>
			</div>
		</div>
		<div class="btn-wrapp text-center xs-mt-20">
			<a href="#" class="btn btn-default big-btn white-border text-uppercase bold">Перейти в раздел</a>
		</div>
		<div class="baner-wrapp text-center xs-mt-30 xs-mb-15">
			<img src="{{ asset('/asset/img/banner.png') }}" alt="news1">
		</div>
	</div>
</div>

<div class="container xs-pt-20 xs-pb-40">
	<div class="block-title">
		<h2 class="block-title_text">Аналитика</h2>
	</div>
	<div class="row analitic-content xs-mt-30">
		<div class="col-md-4">
			<p class="analitic-content_title">Цены в Европе (вчера)</p>
			<table class="table xs-mt-35">
				<tbody>
					<tr>
						<td class="price-title">RBOB Gasoline (NYMEX), $/Gall</td>
						<td class="text-left price-value fix-width">1.6212 <i class="fa fa-caret-down text-danger"></i></td>
					</tr>
					<tr>
						<td class="price-title">RBOB Gasoline (NYMEX), $/Gall</td>
						<td class="text-left  price-value fix-width">1.62 <i class="fa fa-caret-up text-success"></i></td>
					</tr>
					<tr>
						<td class="price-title">RBOB Gasoline (NYMEX), $/Gall</td>
						<td class="text-left  price-value fix-width">1.62 <i class="fa fa-caret-up text-success"></i></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-md-4">
			<p class="analitic-content_title">Цены в Украине (вчера)</p>
			<table class="table">
				<thead>
					<tr>
						<th></th>
						<th class="field-name">Опт, грн/т</th>
						<th class="field-name">Розница, грн/л</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="price-title">А-95</td>
						<td class="price-value fa-style">285752<i class="fa fa-caret-up text-success"></i></td>
						<td class="text-left price-value fa-style">1.6212 <i class="fa fa-caret-down text-danger"></i></td>
					</tr>
					<tr>
						<td class="price-title">А-95</td>
						<td class="price-value fa-style">285752</td>
						<td class="text-left price-value fa-style">1.6212 <i class="fa fa-caret-down text-danger"></i></td>
					</tr>
					<tr>
						<td class="price-title">А-95</td>
						<td class="price-value fa-style">285752</td>
						<td class="text-left price-value fa-style">1.6212 <i class="fa fa-caret-down text-danger"></i></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-md-4">
			16.25
		</div>
	</div>
	<div class="baner-wrapp text-center xs-mt-30 xs-mb-15">
		<img src="{{ asset('/asset/img/banner.png') }}" alt="news1">
	</div>
</div>

@endsection
