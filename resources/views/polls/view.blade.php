@extends('layouts.main')

@include('partials.seo2')

@section('section')
	@include('partials.title')
	<div class="xs-pl-0 xs-pr-0 sm-pl-15 sm-pr-15">
    <div class="row">
			<div class="col-md-9 sticky sticky-sm sticky-lg xs-pt-30">
				@if($answer)
					<div class="form-group poll xs-pl-10 xs-pr-15 xs-pt-15 xs-pb-15">
						<h3 class="xs-pb-15">{{$fields->name}}</h3>
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
					</div>
			  @else
					<div class="form-group poll xs-pl-10 xs-pr-15 xs-pt-15 xs-pb-15">
						<h3 class="xs-pb-15">{{$fields->name}}</h3>
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
		</div>
	</div>
@endsection
