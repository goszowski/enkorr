@extends('layouts.main')

@section('page')

<div class="container-fluid grey-bg xs-pb-30 xs-pt-20">
	<div class="container">

		<div class="row">

			<div class="home-last-news">
				<div class="col-md-6">

					@if($first_main_news_item)
						{{-- Перша гловна новина --}}
						<a href="{{ lPath($first_main_news_item->node->absolute_path) }}" class="last-news__big">
							<img src="{{ asset('gallery/' . $first_main_news_item->image) }}" alt="{{ $first_main_news_item->name }}">
							<div class="last-news__big_description">
								<h2 class="last-news__big_descr_title text-uppercase">{{ $first_main_news_item->name }}</h2>
								<p class="last-news__big_descr_text">{{ $first_main_news_item->announce }}</p>
							</div>
						</a>
					@endif

				</div>
				<div class="col-md-6 xs-mt-30 md-pl-10 md-mt-0">
					<div class="block-title">
						<h2 class="block-title_text">{{ __('Последние новости') }}</h2>
					</div>
					<div class="last-news-items-wrapp">
						@foreach($news as $news_item)
							<a href="{{ lPath($news_item->node->absolute_path) }}" class="last-news_item">
								<p class="last-news_item_text">{{ str_limit($news_item->name, 100) }}</p>

								@if($news_item->pubdate->isToday())
									<span class="last-news-item_time"><time datetime="{{ $news_item->pubdate }}">{{ $news_item->pubdate->format('H:i') }}</time></span>
								@else
									<span class="last-news-item_time"><time datetime="{{ $news_item->pubdate }}">{{ $news_item->pubdate->format('d.m.Y, H:i') }}</time></span>
								@endif
							</a>
						@endforeach
					</div>
					<div class="last-news-btn-wrapp text-center xs-mt-30 sm-mt-40">
						<a href="{{ lPath('/news') }}" class="btn btn-warning big-btn text-uppercase">{{ __('Перейти в раздел') }}</a>
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
					<h2 class="block-title_text">{{ __('Главные новости') }}</h2>
				</div>
				<div class="equal-block_content">
					@foreach($main_news as $main_news_item)
						<a href="{{ lPath($main_news_item->node->absolute_path) }}" class="main-news_item">
							<p class="main-news_item__text">{{ $main_news_item->name }}</p>
						</a>
					@endforeach
				</div>
			</div>

			<div class="btn-wrapp text-center xs-mt-20">
				<a href="{{ lPath('/news') }}" class="btn btn-default big-btn black-border text-uppercase bold">{{ __('Перейти в раздел') }}</a>
			</div>

		</div>
		<div class="col-md-4">
			<div class="equal-block">
				<div class="block-title">
					<h2 class="block-title_text has-rs-icon">{{ __('Публикации') }}</h2>
				</div>

				<div class="equal-block_content">
					@foreach($publications as $k=>$publication)
						<a href="{{ lPath($publication->node->absolute_path) }}" class="publication-item">

							@if(! $k)
								{{-- Першому елементу публікації показується фото --}}
								<img src="{{ asset('gallery/' . $publication->image) }}" alt="{{ $publication->name }}">
							@endif
							
							<p class="publication-item_text">{{ $publication->name }}</p>
						</a>
					@endforeach
				</div>
			</div>
			<div class="btn-wrapp text-center xs-mt-20">
				<a href="{{ lPath('/publications') }}" class="btn btn-default big-btn black-border text-uppercase bold">{{ __('Перейти в раздел') }}</a>
			</div>
		</div>
		<div class="col-md-4">
			<div class="equal-block bg-warning xs-mt-20 md-mt-0 xs-pl-10 xs-pr-10">
				<div class="block-title white-title">
					<h2 class="block-title_text">{{ __('Интервью') }}</h2>
				</div>
				<div class="equal-block_content">
					<div class="owl-carousel owl-carousel-home">

						@foreach($interviews as $interview)
							<a href="{{ lPath($interview->node->absolute_path) }}" class="home-carousel_item">
								<div class="home-carousel_item__img">
									<img src="{{ asset('gallery/' . $interview->image) }}">
								</div>
								<div class="home-carousel_item__descr">
									@if($interview->has('speaker'))
										<p class="xs-mt-5">{{ $interview->speaker->name }}</p>
									@endif
									
									<p>{{ $interview->name }}</p>
								</div>
							</a>
						@endforeach

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
				<a href="{{ lPath('/interview') }}" class="btn btn-default big-btn black-border text-uppercase bold">{{ __('Перейти в раздел') }}</a>
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
			<h2 class="block-title_text">{{ __('Колонки') }}</h2>
		</div>
		<div class="row sm-mt-30 xs-pb-15">
			@foreach($columns as $column)
				<div class="col-md-4">
					<div class="column-item xs-mt-40 md-mt-20 xs-mb-10">

						@if($column->has('expert'))
							<a href="#" class="column-item_author">
								<div class="row">
									<div class="col-md-4">
										<div class="column-item_author__img">
											<img src="{{ asset('gallery/' . $column->expert->image) }}" alt="{{ $column->expert->name }}">
										</div>
									</div>
									<div class="col-md-8">
										<p class="column-item_author__name">{{ $column->expert->name }}</p>
										<p class="column-item_author__work">{{ $column->expert->info }}</p>
									</div>
								</div>
							</a>
						@endif
						
						<p class="column-item_date xs-mt-20">{{ $column->pubdate->format('d.m.Y, H:i') }}</p>
						<a href="{{ lPath($column->node->absolute_path) }}" class="column-item_text">
							<h3 class="column-item_text__title">{{ $column->name }}</h3>
							<p class="column-item_text__descr xs-mt-25">
								{{ str_limit($column->announce, 100, '') }} <span class="load">...</span>
							</p>
						</a>
					</div>
				</div>
			@endforeach
		</div>
		<div class="btn-wrapp text-center xs-mt-20">
			<a href="{{ lPath('/columns') }}" class="btn btn-default big-btn white-border text-uppercase bold">{{ __('Перейти в раздел') }}</a>
		</div>
		<div class="baner-wrapp text-center xs-mt-30 xs-mb-15">
			<img src="{{ asset('/asset/img/banner.png') }}" alt="news1">
		</div>
	</div>
</div>

<div class="container xs-pt-20 xs-pb-40">
	<div class="block-title">
		<h2 class="block-title_text">{{ __('Аналитика') }}</h2>
	</div>
	<div class="row analitic-content xs-mt-30">
		<div class="col-md-4">
			@include('_partials.indicators.eu')
		</div>
		<div class="col-md-4">
			@include('_partials.indicators.ua')
		</div>
		<div class="col-md-4">
			... код информера ...
		</div>
	</div>
	<div class="baner-wrapp text-center xs-mt-30 xs-mb-15">
		<img src="{{ asset('/asset/img/banner.png') }}" alt="news1">
	</div>
</div>

@endsection
