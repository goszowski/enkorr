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

@section('image')
@if(isset($fields) and isset($fields->image)){{ iPath($fields->image, 'full') }}@endif
@stop

@section('description')
  @if(isset($fields) and isset($fields->description))
    {{$fields->description}}
  @endif
@stop

<div style="display: none;" id="page-title">
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
</div>