@extends('layouts.main')

@section('page')
@include('_partials.seo2')
<div class="container-fluid grey-bg xs-pb-60">
	<div class="container">
		<div class="block-title xs-mt-20">
			<h2 class="block-title_text">{{ $fields->name }}</h2>
		</div>
		
		<div class="row">
			<div class="col-sm-8 news-list_wrapp">
				<div class="news-list_oneday xs-pb-5">

					@foreach($news as $news_item)

						@php(!isset($day_visibled[$news_item->pubdate->format('Ymd')]) ? $day_visibled[$news_item->pubdate->format('Ymd')] = false : null)

						@if(! $day_visibled[$news_item->pubdate->format('Ymd')])
							<div class="news-list_date__wrapp">
								<span class="news-list_date"><time datetime="{{ $news_item->pubdate }}">{{ $news_item->pubdate->format('d') }} {{ trans('public.months.'.$news_item->pubdate->format('m')) }} {{ $news_item->pubdate->format('Y') }}</time></span>
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
                                        @if($news_item->is_important)
                                        <b>{{ $news_item->name }}</b>
                                        @else
                                        {{ $news_item->name }}
                                        @endif
									</h3>
								</div>
							</div>
						</a>
					@endforeach
				</div>

				<div class="pagination-wrapp text-center xs-mt-40">
					{!! $news->render() !!}
				</div>
			</div>
			<div class="col-sm-4">
				@foreach($banners as $banner)
					<div class="baner-wrapp text-center xs-mt-50">
						<a href="{{ $banner->link }}" rel="nofollow" target="_blank">
							<img src="{{ iPath($banner->image, '600px') }}" alt="{{ $banner->name }}">
						</a>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection
