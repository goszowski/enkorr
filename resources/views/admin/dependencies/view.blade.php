@extends('admin.app')
@section('content')
@include('admin.classes.partials.edit_nav')
<div class="p-md">
  @include('admin.fields.partials.class_info')
  <div class="row">
    <div class="col-xs-12 col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading bg-white">
          <i class="fa fa-bars"></i> {{trans('admin/dependencies.available_classes')}}
        </div>
        <div class="panel-body">
          <div class="list-group list-group-alt">
            @if(count($available))
              @foreach($available as $item)
                <a href="{{route('admin.dependencies.add', ['class_id'=>$class->id, 'add_id'=>$item->id])}}" class="list-group-item">
                  <span class="pull-right label bg-success">ID: {{$item->id}}</span>
                  <span class="font-bold">{{$item->name}}</span>
                  <div class="block">
                    <span class="label">{{$item->shortname}}</span>
                  </div>
                </a>
              @endforeach
            @else
              {{trans('admin/dependencies.empty')}}
            @endif
          </div>
        </div>
      </div>
    </div>

    <div class="col-xs-12 col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading bg-white">
          <i class="fa fa-bars"></i> {{trans('admin/dependencies.submitted_classes')}}
        </div>
        <div class="panel-body">
          <div class="list-group list-group-alt">
            @if(count($submitted))
              @foreach($submitted as $item)
                <a href="{{route('admin.dependencies.remove', ['class_id'=>$class->id, 'remove_id'=>$item->classes->id])}}" class="list-group-item">
                  <span class="pull-right label bg-success">ID: {{$item->classes->id}}</span>
                  <span class="font-bold">{{$item->classes->name}}</span>
                  <div class="block">
                    <span class="label">{{$item->classes->shortname}}</span>
                  </div>
                </a>
              @endforeach
            @else
              {{trans('admin/dependencies.empty')}}
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@stop
