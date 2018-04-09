@extends('templates.layout')

@section('page')

<div class="container-fluid grey-bg xs-pb-60">
	<div class="container">
		<div class="block-title xs-mt-20">
			<h2 class="block-title_text">Последние новости</h2>
		</div>
		
		<div class="row">
			<div class="col-sm-8 news-list_wrapp">
				<div class="news-list_oneday xs-pb-5">
					<div class="news-list_date__wrapp">
						<span class="news-list_date"><time>5 марта 2018</time></span>
					</div>
					<a href="#" class="main-news_sidebar news-list-item xs-pb-10 xs-pt-25">
						<span class="text-uppercase exclusive-public news-exclusive">Эксклюзив</span>
						<div class="row">
							<div class="col-sm-1">
								<p class="comment-text_time text-uppercase small-text"><time>15:02</time></p>
							</div>
							<div class="col-sm-11">
								<h3 class="main-news_sidebar__title news-list-title xs-mt-0">
									<b> Названа возможная стоимость билетов на поезда Hyperloop в Украине</b>
								</h3>
							</div>
						</div>
					</a>
					<a href="#" class="main-news_sidebar news-list-item xs-pb-10 xs-pt-25">
						<span class="text-uppercase exclusive-public news-exclusive">Эксклюзив</span>
						<div class="row">
							<div class="col-sm-1">
								<p class="comment-text_time text-uppercase small-text"><time>15:02</time></p>
							</div>
							<div class="col-sm-11">
								<h3 class="main-news_sidebar__title news-list-title xs-mt-0">
									Названа возможная стоимость билетов на поезда Hyperloop в Украине
								</h3>
							</div>
						</div>
					</a>
					<a href="#" class="main-news_sidebar news-list-item xs-pb-10 xs-pt-25">
						<div class="row">
							<div class="col-sm-1">
								<p class="comment-text_time text-uppercase small-text"><time>15:02</time></p>
							</div>
							<div class="col-sm-11">
								<h3 class="main-news_sidebar__title news-list-title xs-mt-0">
									Названа возможная стоимость билетов на поезда Hyperloop в Украине
								</h3>
							</div>
						</div>
					</a>
				</div>
				<div class="news-list_oneday xs-pb-5">
					<div class="news-list_date__wrapp">
						<span class="news-list_date"><time>5 марта 2018</time></span>
					</div>
					<a href="#" class="main-news_sidebar news-list-item xs-pb-10 xs-pt-25">
						<span class="text-uppercase exclusive-public news-exclusive">Эксклюзив</span>
						<div class="row">
							<div class="col-sm-1">
								<p class="comment-text_time text-uppercase small-text"><time>15:02</time></p>
							</div>
							<div class="col-sm-11">
								<h3 class="main-news_sidebar__title news-list-title xs-mt-0">
									Названа возможная стоимость билетов на поезда Hyperloop в Украине
								</h3>
							</div>
						</div>
					</a>
					<a href="#" class="main-news_sidebar news-list-item xs-pb-10 xs-pt-25">
						<div class="row">
							<div class="col-sm-1">
								<p class="comment-text_time text-uppercase small-text"><time>15:02</time></p>
							</div>
							<div class="col-sm-11">
								<h3 class="main-news_sidebar__title news-list-title xs-mt-0">
									Названа возможная стоимость билетов на поезда Hyperloop в Украине
								</h3>
							</div>
						</div>
					</a>
					<a href="#" class="main-news_sidebar news-list-item xs-pb-10 xs-pt-25">
						<div class="row">
							<div class="col-sm-1">
								<p class="comment-text_time text-uppercase small-text"><time>15:02</time></p>
							</div>
							<div class="col-sm-11">
								<h3 class="main-news_sidebar__title news-list-title xs-mt-0">
									Названа возможная стоимость билетов на поезда Hyperloop в Украине
								</h3>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="baner-wrapp text-center xs-mt-50">
					<img src="{{ asset('/asset/img/sidebar-baner.png') }}" alt="cc">
				</div>
				<div class="baner-wrapp text-center xs-pt-25 xs-mb-40">
					<img src="{{ asset('/asset/img/sidebar-baner.png') }}" alt="cc">
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
