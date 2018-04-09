@extends('layouts.main')

@section('page')

<div class="container-fluid grey-bg xs-pb-60">
	<div class="container">
		<div class="block-title xs-mt-20">
			<h2 class="block-title_text">{{ $fields->name }}</h2>
		</div>
		<a href="{{ lPath($first_interview->node->absolute_path) }}" class="big-publication xs-mt-20">
			<div class="row">
				<div class="col-sm-8 sm-md-padd-r-0">
					<div class="publication-list-img big-publication_img">
						<img src="{{ asset('gallery/' . $first_interview->image) }}" alt="{{ $first_interview->name }}">
					</div>
				</div>
				<div class="col-sm-4 sm-md-padd-l-0">
					<div class="publication-sidebar_item__descr publication-list_item__descr big-pb_descr">
						<h3 class="publication-sidebar_item__title big-pb_descr_title">{{ $first_interview->name }}</h3>
						<p class="publication-sidebar_item__text xs-mt-15">{{ str_limit($first_interview->announce, 130) }}</p>
						<p class="comment-text_time text-uppercase"><time>{{ $first_interview->pubdate->format('d.m.Y, H:i') }}</time></p>
					</div>
				</div>
			</div>
		</a>
		<div class="row">
			@foreach($interviews->slice(1,count($interviews)) as $interview)
				<div class="col-sm-6 col-md-4">
					<a href="{{ lPath($interview->node->absolute_path) }}" class="publication-sidebar_item xs-mt-20">
						<div class="sidebar_item__img publication-list-img">
							<img src="{{ asset('gallery/' . $interview->image) }}" alt="{{ $interview->name }}">

							@if($interview->is_exclusive)
								<span class="text-uppercase exclusive-public">{{ __('Эксклюзив') }}</span>
							@endif
						</div>
						<div class="publication-sidebar_item__descr publication-list_item__descr">
							<h3 class="publication-sidebar_item__title">{{ $interview->name }}</h3>
							<p class="publication-sidebar_item__text xs-mt-15">{{ str_limit($interview->announce, 130) }}</p>
							<p class="comment-text_time text-uppercase"><time>{{ $interview->pubdate->format('d.m.Y, H:i') }}</time></p>
						</div>
					</a>
				</div>
			@endforeach
		</div>

		{!! $interviews->render() !!}
	</div>
</div>

@endsection
