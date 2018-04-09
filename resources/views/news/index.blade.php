@extends('layouts.main')

@section('page')
<div class="container-fluid grey-bg xs-pb-60">
	<div class="container">
		<div class="block-title xs-mt-20">
			<h2 class="block-title_text">{{ $fields->name }}</h2>
		</div>
		
		<div class="row">
			<div class="col-sm-8 news-list_wrapp">
				<div class="news-list_oneday xs-pb-5">

					@foreach($news as $news_item)

						@php($day_visibled[$news_item->pubdate->format('Ymd')] = false)

						@if(! $day_visibled[$news_item->pubdate->format('Ymd')])
							<div class="news-list_date__wrapp">
								<span class="news-list_date"><time>{{ $news_item->pubdate->format('d.m.Y') }}</time></span>
							</div>

							@php($day_visibled[$news_item->pubdate->format('Ymd')] = true)
						@endif

						<a href="{{ lPath($news_item->node->absolute_path) }}" class="main-news_sidebar news-list-item xs-pb-10 xs-pt-25">

							@if($news_item->is_exclusive)
								<span class="text-uppercase exclusive-public news-exclusive">{{ __('Эксклюзив') }}</span>
							@endif
							
							<div class="row">
								<div class="col-sm-1">
									<p class="comment-text_time text-uppercase small-text"><time>{{ $news_item->pubdate->format('H:i') }}</time></p>
								</div>
								<div class="col-sm-11">
									<h3 class="main-news_sidebar__title news-list-title xs-mt-0">
										<b>{{ $news_item->name }}</b>
									</h3>
								</div>
							</div>
						</a>
					@endforeach
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
