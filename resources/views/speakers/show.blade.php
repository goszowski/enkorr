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

					@foreach($interviews as $interview)

						@php(!isset($day_visibled[$interview->pubdate->format('Ymd')]) ? $day_visibled[$interview->pubdate->format('Ymd')] = false : null)

						@if(! $day_visibled[$interview->pubdate->format('Ymd')])
							<div class="news-list_date__wrapp">
								<span class="news-list_date"><time datetime="{{ $interview->pubdate }}">{{ $interview->pubdate->format('d') }} {{ trans('public.months.'.$interview->pubdate->format('m')) }} {{ $interview->pubdate->format('Y') }}</time></span>
							</div>

							@php($day_visibled[$interview->pubdate->format('Ymd')] = true)
						@endif

						<a href="{{ lPath($interview->node->absolute_path) }}" class="main-news_sidebar news-list-item xs-pb-10 xs-pt-25">

							@if($interview->is_exclusive)
								<span class="text-uppercase exclusive-public news-exclusive">{{ __('Эксклюзив') }}</span>
							@endif
							
							<div class="row">
								<div class="col-sm-1">
									<p class="comment-text_time text-uppercase small-text"><time>{{ $interview->pubdate->format('H:i') }}</time></p>
								</div>
								<div class="col-sm-11">
									<h3 class="main-news_sidebar__title news-list-title xs-mt-0">
										<b>{{ $interview->name }}</b>
									</h3>
								</div>
							</div>
						</a>
					@endforeach
				</div>

				<div class="pagination-wrapp text-center xs-mt-40">
					{!! $interviews->render() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
