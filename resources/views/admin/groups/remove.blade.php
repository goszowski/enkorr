@extends('admin.app')
@section('content')
{{-- @include('admin.classes.partials.edit_nav') --}}
<div class="p-md">
  @include('admin.fields.partials.class_info')
  <div class="panel panel-danger">
    <div class="panel-heading">
      <i class="fa fa-trash"></i> {{trans('admin/groups.remove')}} <small>({{$class->name}} / {{$group->name}})</small>
    </div>
    <div class="panel-body">
      {!! Form::open(array('route' => ['admin.groups.remove', $group->id], 'class' => 'form-horizontal')) !!}
        <input type="hidden" name="id" value="{{$group->id}}">
        <input type="hidden" name="class_id" value="{{$class->id}}">
        <div class="form-group">
          <div class="col-md-10 col-md-offset-2">
            <div class="text-danger">
              <i class="fa fa-exclamation-circle"></i> {{trans('admin/groups.remove_confirmation')}}
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-10 col-md-offset-2">
            <a href="{{route('admin.groups.edit', ['class_id'=>$class->id, 'group_id'=>$group->id])}}" class="btn btn-default"><i class="fa fa-pencil-square-o"></i> {{trans('admin/groups.edit')}}</a>
            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> {{trans('admin/groups.remove')}}</button>
          </div>
        </div>

      {!! Form::close() !!}
    </div>
  </div>
</div>

@stop
