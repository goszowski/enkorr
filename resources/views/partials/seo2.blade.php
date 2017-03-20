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
