@extends('admin.app')
@section('content')

@include('admin.classes.partials.edit_nav')

<div class="p-md">
  @include('admin.fields.partials.class_info')
  <div class="panel panel-default">
    <div class="panel-heading bg-white">
      <i class="fa fa-bars"></i> {{trans('admin/fields.listing_items')}} <small class="text-muted">({{$class->name}})</small>
    </div>
    <div class="panel-body">
      <a href="{{route('admin.fields.create', $class->id)}}" class="btn btn-sm btn-addon btn-success">
        <i class="fa fa-plus fa-fw"></i>
        {{trans('admin/fields.create_field')}}
      </a>
    </div>
    @if(count($fields))
      <table class="table table-striped table-hover table-condensed">
        <thead>
          <tr>
            <th>#</th>
            <th>{{trans('admin/fields.name')}}</th>
            <th>{{trans('admin/fields.shortname')}}</th>
            <th>{{trans('admin/fields.type')}}</th>
            <th>{{trans('admin/fields.group')}}</th>
            <th class="text-center">{{trans('admin/fields.required')}}</th>
            <th class="text-center">{{trans('admin/fields.shown')}}</th>
            <th class="text-center">{{trans('admin/fields.order')}}</th>
            <th class="text-center">{{trans('admin/fields.settings')}}</th>
            <th class="text-right">{{trans('admin/fields.action')}}</th>
          </tr>
        </thead>
        <tbody>
          @foreach($fields as $k=>$field)
          <tr>
            <td>{{$field->id}}</td>
            <td>{{$field->name}}</td>
            <td>{{$field->shortname}}</td>
            <td><span class="label bg-warning">{{$field->type->name}}</span></td>
            <td>@if(isset($field->group))<span class="label bg-success">{{$field->group->name}}</span>@endif</td>
            <td class="text-center"><i class="fa @if($field->required) fa-check text-success @else fa-times text-muted @endif"></i></td>
            <td class="text-center"><i class="fa @if($field->shown) fa-check text-success @else fa-times text-muted @endif"></i></td>
            <td class="text-center">
              <div class="btn-group" role="group">
                <a href="{{route('admin.fields.moveup', ['class_id'=>$class->id, 'field_id'=>$field->id])}}" class="btn btn-sm btn-default" @if($k < 1) disabled @endif><i class="fa fa-chevron-up"></i></a>
                <a href="{{route('admin.fields.movedown', ['class_id'=>$class->id, 'field_id'=>$field->id])}}" class="btn btn-sm btn-default" @if(++$k == count($fields)) disabled @endif><i class="fa fa-chevron-down"></i></a>
              </div>
            </td>
            <td class="text-center">
              <a href="{{route('admin.fields.settings', ['class_id'=>$class->id, 'field_id'=>$field->id])}}" class="btn btn-warning btn-sm"><i class="fa fa-cog"></i> Settings</a>
            </td>
            <td class="text-right">
              <div class="btn-group">
                <a href="{{route('admin.fields.edit', ['class_id'=>$class->id, 'field_id'=>$field->id])}}" class="btn btn-sm btn-primary"><i class="fa fa-pencil-square-o"></i> {{trans('admin/fields.edit')}}</a>
                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li><a href="{{route('admin.fields.settings', ['class_id'=>$class->id, 'field_id'=>$field->id])}}"><i class="fa fa-cog"></i> Settings</a></li>
                  <li><a href="{{route('admin.fields.remove_confirmation', ['class_id'=>$class->id, 'field_id'=>$field->id])}}"><i class="fa fa-trash"></i> {{trans('admin/fields.remove')}}</a></li>
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
