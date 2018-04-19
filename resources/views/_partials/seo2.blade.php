@section('title')
  @if(isset($fields) and isset($fields->title))
    @if($fields->title)
      {{$fields->title}}
    @else
      @if(isset($fields->name) and $fields->name)
        {{$fields->name}}
      @else
        {{config('app.name')}}
      @endif
    @endif
  @endif
@stop

@section('og:title')
  @if(isset($fields) and isset($fields->title))
    @if($fields->title)
      {{$fields->title}}
    @else
      @if(isset($fields->name) and $fields->name)
        {{$fields->name}}
      @else
        {{config('app.name')}}
      @endif
    @endif
  @endif
@stop

@if($fields->description)
  @section('og:description', $fields->description)
  @section('description', $fields->description)
@endif

@if($fields->image)
  @section('og:image', iPath($fields->image, 'full'))
@endif
