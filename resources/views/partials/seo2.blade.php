@section('title')
@if(isset($fields))
  @if(isset($fields->title))
    {{ $fields->title }}
  @endif

  @if(isset($fields->name) and (!isset($fields->title) or !$fields->title))
    {{ $fields->name }}
  @endif
@else 
  {{config('app.name')}}
@endif
@stop

@section('image')
@if(isset($fields) and isset($fields->image)){{ iPath($fields->image, 'full') }}@endif
@stop

@section('description')
  @if(isset($fields) and isset($fields->description))
    {{$fields->description}}
  @endif
@stop

<div style="display: none;" id="page-title">
@if(isset($fields))
  @if(isset($fields->title))
    {{ $fields->title }}
  @endif

  @if(isset($fields->name) and (!isset($fields->title) or !$fields->title))
    {{ $fields->name }}
  @endif
@else 
  {{config('app.name')}}
@endif
</div>