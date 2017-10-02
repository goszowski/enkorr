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