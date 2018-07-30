@extends('layouts.main')

@section('page')
<div class="container-fluid grey-bg">
	<div class="container">
		<div class="row">
			<div class="col-md-8 xs-mt-20">
				<h1 class="page-news_title">{{ $parent->name }}/{{ $fields->name }}</h1>
				

				<div class="publication-page_text">
					{!! Form::open(['url'=>str_is('/search*', $fields->node->absolute_path) ? $fields->node->absolute_path : lPath('/search/news'), 'method'=>'get']) !!}
						<div class="input-group input-group-lg">
							<input autofocus="" type="text" name="term" class="form-control" value="{{ request('term') }}" placeholder="{{ __('Введите фразу для поиска') }}">
							<div class="input-group-btn">
								<button class="btn btn-warning" type="submit"><i class="fa fa-search"></i> {{ __('Поиск') }}</button>
							</div>
						</div>
						<div class="xs-pt-30">
							<b>{{ __('Где искать') }}:</b>
						</div>
						<div class="row xs-pt-15">
							<div class="col-xs-4">
								<label>
									<input {{ (request('titles') or (!request('titles') and !request('announces') and !request('texts'))) ? 'checked' : null }} type="checkbox" name="titles"> {{ __('Заголовки') }}
								</label>
							</div>
							{{-- <div class="col-xs-4">
								<label>
									<input {{ request('announces') ? 'checked' : null }} type="checkbox" name="announces"> {{ __('Описание') }}
								</label>
							</div> --}}
							<div class="col-xs-4">
								<label>
									<input {{ request('texts') ? 'checked' : null }} type="checkbox" name="texts"> {{ __('Текст') }}
								</label>
							</div>
						</div>
					{!! Form::close() !!}

					@yield('search')

				</div>
			</div>
			<div class="col-md-4 xs-pt-30 md-pt-90">
				{{-- Категорії пошуку --}}
				<div class="list-group">
					@foreach($categories as $category)
						<a href="{{ lPath($category->node->absolute_path) }}?term={{ request('term') }}&titles={{ request('titles') ? 'on' : null }}&announces={{ request('announces') ? 'on' : null }}&texts={{ request('texts') ? 'on' : null }}" class="list-group-item rippler {{ $fields->node->absolute_path == $category->node->absolute_path ? 'active' : null }}" data-ajax="true" onclick="$(this).parent().find('a').removeClass('active'); $(this).addClass('active')">
							{{ $category->name }}

							@if(request('term'))
								<span class="badge">{{ $category->resultsAmount() }}</span>
							@endif
						</a>
					@endforeach
				</div>
				{{-- / Категорії пошуку --}}
			</div>
		</div>
	</div>
</div>
@endsection
