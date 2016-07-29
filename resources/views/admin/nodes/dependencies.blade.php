@extends('admin.app')
@section('content')
@include('admin.nodes.partials.items_nav')
<div class="p-md">
  <div class="form-group">
    <a href="{{route('admin.nodes.edit', $node->id)}}" class="btn btn-default">{{trans('admin/nodes.close')}}</a>
  </div>
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
                <a href="{{route('admin.nodes.dependencies.add', ['node_id'=>$node->id, 'add_id'=>$item->id])}}" class="list-group-item">
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
                <a href="{{route('admin.nodes.dependencies.remove', ['node_id'=>$node->id, 'remove_id'=>$item->classes->id])}}" class="list-group-item">
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
