@extends('layouts.main')

@section('page')
@include('_partials.seo2')
<div class="container-fluid grey-bg">
	<div class="container">
		<div class="row">
			<div class="col-md-8 xs-mt-20 ">
				<h1 class="page-news_title">{{ $fields->name }}</h1>
				

				<div class="publication-page_text">
					{!! $fields->content !!}
				</div>
				<a href="javascript:print()" class="publication-print xs-pb-25 xs-mt-40 sm-mt-70 text-right">
					<img src="{{ asset('/asset/img/printer.png') }}">
					<span class="text-uppercase xs-ml-5">{{ __('Печать') }}</span>
				</a>
			</div>
		</div>

	</div>
</div>
@endsection
