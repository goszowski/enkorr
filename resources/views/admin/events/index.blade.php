@extends('admin.app')
@section('content')

<div class="p-md">
  @if(count($events))
    <ul class="timeline timeline-center">
      <li class="tl-header">{{trans('admin/events.app_name')}}</li>
      @foreach($events as $event)
        <li class="tl-item">
          <div class="tl-wrap b-primary">
            <span class="tl-date text-muted"><small>{{$event->created_at}}</small></span>
            <div class="tl-content panel b-a w-lg w-auto-xs">
              <span class="arrow b-white left pull-top"></span>
              <div class="text-lt p-h m-b-sm">
                <a href="#">{{$event->user->name}}</a>
              </div>
              <div class="p b-t b-light">
                <span class="label bg-warning">{{trans('admin/events.'.$event->type->name)}}</span>
                 {{trans('admin/events.node')}} <a href="#">{{$event->node->data()->name}}</a>
              </div>
            </div>
          </div>
        </li>
      @endforeach
    </ul>
  @else
    <div class="alert alert-default">
      {{trans('admin/events.Немає подій')}}
    </div>
  @endif
</div>
@stop
