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

					@foreach($columns as $column)

						@php(!isset($day_visibled[$column->pubdate->format('Ymd')]) ? $day_visibled[$column->pubdate->format('Ymd')] = false : null)

						@if(! $day_visibled[$column->pubdate->format('Ymd')])
							<div class="news-list_date__wrapp">
								<span class="news-list_date"><time datetime="{{ $column->pubdate }}">{{ $column->pubdate->format('d') }} {{ trans('public.months.'.$column->pubdate->format('m')) }} {{ $column->pubdate->format('Y') }}</time></span>
							</div>

							@php($day_visibled[$column->pubdate->format('Ymd')] = true)
						@endif

						<a href="{{ lPath($column->node->absolute_path) }}" class="main-news_sidebar news-list-item xs-pb-10 xs-pt-25">

							@if($column->is_exclusive)
								<span class="text-uppercase exclusive-public news-exclusive">{{ __('Эксклюзив') }}</span>
							@endif
							
							<div class="row">
								<div class="col-sm-1">
									<p class="comment-text_time text-uppercase small-text"><time>{{ $column->pubdate->format('H:i') }}</time></p>
								</div>
								<div class="col-sm-11">
									<h3 class="main-news_sidebar__title news-list-title xs-mt-0">
										<b>{{ $column->name }}</b>
									</h3>
								</div>
							</div>
						</a>
					@endforeach
				</div>

				<div class="pagination-wrapp text-center xs-mt-40">
					{!! $columns->render() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
