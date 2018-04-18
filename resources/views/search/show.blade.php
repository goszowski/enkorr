@extends('layouts.search')

@section('search')
	@if(! request('term'))
		<div class="alert alert-warning xs-mt-30">
			<i class="fa fa-info"></i> {{ __('Введите фразу для поиска') }}
		</div>
	@else
		@if(! count($results))
			<div class="alert alert-warning xs-mt-30">
				<i class="fa fa-info"></i> {{ __('Поиск не дал результатов') }}
			</div>
		@else
			<div class="news-list_oneday">
				@foreach($results as $results_item)
					<a href="{{ lPath($results_item->node->absolute_path) }}" class="main-news_sidebar news-list-item xs-pb-10 xs-pt-25">
						<div class="row">
							<div class="col-sm-2">
								<p class="comment-text_time text-uppercase small-text"><time>{{ $results_item->pubdate->format('d.m.Y, H:i') }}</time></p>
							</div>
							<div class="col-sm-10">
								<h3 class="main-news_sidebar__title news-list-title xs-mt-0">
									<b>{{ $results_item->name }}</b>
								</h3>
							</div>
						</div>
					</a>
				@endforeach
			</div>

			{!! $results->appends(['term'=>request('term')])->render() !!}
		@endif
	@endif
@endsection
