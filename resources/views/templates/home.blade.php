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
				<div class="col-md-6 xs-mt-30 md-mt-0">
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
		<div class="baner-wrapp text-center xs-mt-30 md-mt-25 xs-mb-15">
			<img src="{{ asset('/asset/img/banner.png') }}" alt="news1">
		</div>
	</div>
</div>

<div class="container">
	<ul>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>

@endsection
