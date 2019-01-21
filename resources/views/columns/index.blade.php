@extends('layouts.main')

@section('page')
@include('_partials.seo2')
<div class="container-fluid grey-bg xs-pb-60">
	<div class="container">
		<div class="block-title xs-mt-20">
			<h2 class="block-title_text">{{ $fields->name }}</h2>
		</div>
		<a href="{{ lPath($first_column->node->absolute_path) }}" class="big-publication xs-mt-20">
			<div class="row">
				<div class="col-sm-8 sm-md-padd-r-0">
					<div class="publication-list-img big-publication_img">
                        @if($first_column->image)
                        <img src="{{ asset('gallery/' . $first_column->image) }}" alt="{{ $first_column->name }}">
                        @else
                        <img src="{{ asset('asset/images/enkorr_noimage.jpg') }}" alt="{{ $first_column->name }}">
                        @endif
					</div>
				</div>
				<div class="col-sm-4 sm-md-padd-l-0">
					<div class="publication-sidebar_item__descr publication-list_item__descr big-pb_descr">
						@if($first_column->has('expert'))
							<div class="xs-pb-10">
								<div class="label label-warning">
									{{ $first_column->expert->name }}
								</div>
							</div>
						@endif
						<h3 class="publication-sidebar_item__title big-pb_descr_title">
							{{ str_limit($first_column->name, 80) }}
						</h3>
						<p class="publication-sidebar_item__text xs-mt-15">{{ str_limit($first_column->announce, 90) }}</p>
						<p class="comment-text_time text-uppercase">
							<time>{{ $first_column->pubdate->format('d.m.Y, H:i') }}</time>
						</p>
					</div>
				</div>
			</div>
		</a>
		<div class="row">
			@foreach($columns->slice(1,count($columns)) as $column)
				<div class="col-sm-6 col-md-4">
					<a href="{{ lPath($column->node->absolute_path) }}" class="publication-sidebar_item xs-mt-20">
						<div class="sidebar_item__img publication-list-img">
                            @if($column->image)
                            <img src="{{ asset('gallery/' . $column->image) }}" alt="{{ $column->name }}">
                            @endif

							@if($column->is_exclusive)
								<span class="text-uppercase exclusive-public">{{ __('Эксклюзив') }}</span>
							@endif
						</div>
						<div class="publication-sidebar_item__descr publication-list_item__descr">
							@if($column->has('expert'))
								<div class="xs-pb-10">
									<div class="label label-warning">
										{{ $column->expert->name }}
									</div>
								</div>
							@endif
							<h3 class="publication-sidebar_item__title">
								{{ $column->name }}
							</h3>
							<p class="publication-sidebar_item__text xs-mt-15">{{ str_limit($column->announce, 70) }}</p>
							<p class="comment-text_time text-uppercase"><time>{{ $column->pubdate->format('d.m.Y, H:i') }}</time></p>
						</div>
					</a>
				</div>
			@endforeach
		</div>

		{!! $columns->render() !!}
	</div>
</div>

@endsection
