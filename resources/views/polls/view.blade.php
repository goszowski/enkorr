@extends('layouts.main')

@include('partials.seo2')

@section('section')
	@include('partials.title')
	<div class="xs-pl-0 xs-pr-0 sm-pl-15 sm-pr-15">
    <div class="row">
			<div class="col-md-9 sticky sticky-sm sticky-lg xs-pt-30">
				@if($answer)

					<h1 class="h3 xs-mt-0">
							<b>{{ $fields->name }}</b>
					</h1>
						@foreach ($answers as $answer)
							<p>
								{{$answer->name}}
							</p>
							<div class="progress">
								<div class="progress-bar" role="progressbar" aria-valuenow="{{$answer->count}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$answer->count}}%">
									{{$answer->count.'%'}}
								</div>
							</div>
						@endforeach

			  @else

					<h1 class="h3 xs-mt-0">
							<b>{{ $fields->name }}</b>
					</h1>
					<div class="form-group poll">
						{{Form::open(['route' => 'pollAnswer', 'method' => 'post'])}}
							<input hidden name="poll" value="{{$fields->node_id}}">
							@if(count($answers))
								@foreach($answers as $k => $option)
									<div class="checkbox ripple" data-color="#ccc">
										<input type="radio" name="option" id="variant-{{$k}}" value="{{$option->node_id}}">
										<label for="variant-{{$k}}">{{$option->name}}</label>
									</div>
								@endforeach
							@endif
							<button class="btn btn-primary">Голосовать</button>
						{{Form::close()}}
					</div>
			  @endif
			</div>
			<div class="col-md-3 hidden-xs hidden-sm sticky sticky-lg xs-pt-30">
				@include('partials.allpolls')
			</div>
		</div>
	</div>
@endsection
