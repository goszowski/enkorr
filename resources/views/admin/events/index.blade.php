@extends('admin.app')
@section('content')

<div class="p-md">
  @if(count($events))
    <ul class="timeline timeline-center">
      <li class="tl-header">{{trans('admin/events.app_name')}}</li>
      @foreach($events as $k=>$event)
        <li class="tl-item @if($k%2 == 0) tl-left @endif">
          <div class="tl-wrap b-primary">
            <span class="tl-date text-muted"><small>{{$event->created_at}}</small></span>
            <div class="tl-content panel b-a w-lg w-auto-xs">
              <span class="arrow b-white @if($k%2 == 0) right @else left @endif pull-top"></span>
              <div class="text-lt p-h m-b-sm">
                <a href="{{route('admin.events.user', $event->user->id)}}">{{$event->user->name}}</a>
              </div>
              <div class="p b-t b-light">
                <span class="label

                  @if($event->type->name == 'Create')
                    bg-success
                  @elseif($event->type->name == 'Update')
                    bg-warning
                  @elseif($event->type->name == 'Delete')
                    bg-danger
                  @endif

                ">{{trans('admin/events.'.$event->type->name)}}</span>
                 {{trans('admin/events.node')}} <a href="{{route('admin.nodes.edit', $event->node->id)}}">{{@$event->node->data()->name}}</a>
              </div>
            </div>
          </div>
        </li>
      @endforeach
    </ul>

    <div class="text-center">
      {!! $events->render() !!}
    </div>
  @else
    <div class="alert alert-default">
      {{trans('admin/events.Немає подій')}}
    </div>
  @endif
</div>
@stop
