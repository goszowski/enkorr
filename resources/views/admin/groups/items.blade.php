@extends('admin.app')
@section('content')

@include('admin.classes.partials.edit_nav')


<div class="p-md">
  @include('admin.fields.partials.class_info')
  <div class="panel panel-default">
    <div class="panel-heading bg-white">
      <i class="fa fa-bars"></i> {{trans('admin/groups.listing_items')}} <small class="text-muted">({{$class->name}})</small>
    </div>
    <div class="panel-body">
      <a href="{{route('admin.groups.create', $class->id)}}" class="btn btn-sm btn-addon btn-success">
        <i class="fa fa-plus fa-fw"></i>
        {{trans('admin/groups.create_group')}}
      </a>
    </div>
    @if(count($items))
      <table class="table table-striped table-hover table-condensed">
        <thead>
          <tr>
            <th>#</th>
            <th>{{trans('admin/groups.name')}}</th>
            <th class="text-right">{{trans('admin/groups.action')}}</th>
          </tr>
        </thead>
        <tbody>
          @foreach($items as $item)
          <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td class="text-right">
              <div class="btn-group">
                <a href="{{route('admin.groups.edit', ['class_id'=>$class->id, 'group_id'=>$item->id])}}" class="btn btn-sm btn-primary"><i class="fa fa-pencil-square-o"></i> {{trans('admin/groups.edit')}}</a>
                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li><a href="{{route('admin.groups.remove_confirmation', ['class_id'=>$class->id, 'group_id'=>$item->id])}}"><i class="fa fa-trash"></i> {{trans('admin/groups.remove')}}</a></li>
                </ul>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
    </table>
    @endif
  </div>
</div>
@stop
