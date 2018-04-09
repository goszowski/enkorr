@extends('layouts.main')

@section('page')

<div class="container-fluid grey-bg xs-pb-60">
	<div class="container">
		<div class="block-title xs-mt-20">
			<h2 class="block-title_text">{{ $fields->name }}</h2>
		</div>
		<div class="row">
			@foreach($publications as $k=>$publication)

				@if($k and $k%3 == 0)
					</div><div class="row">
				@endif

				<div class="col-sm-6 col-md-4">
					<a href="{{ lPath($publication->node->absolute_path) }}" class="publication-sidebar_item xs-mt-20">
						<div class="sidebar_item__img publication-list-img">
							<img src="{{ asset('gallery/' . $publication->image) }}" alt="{{ $publication->name }}">

							@if($publication->is_exclusive)
								<span class="text-uppercase exclusive-public">{{ __('Эксклюзив') }}</span>
							@endif
						</div>
						<div class="publication-sidebar_item__descr publication-list_item__descr">
							<h3 class="publication-sidebar_item__title">{{ $publication->name }}</h3>
							<p class="publication-sidebar_item__text xs-mt-15">{{ str_limit($publication->announce, 130) }}</p>
							<p class="comment-text_time text-uppercase"><time>{{ $publication->pubdate->format('d.m.Y, H:i') }}</time></p>
						</div>
					</a>
				</div>
			@endforeach
		</div>

		{!! $publications->render() !!}
	</div>
</div>

@endsection
