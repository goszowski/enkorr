@extends('admin.app')
@section('content')
{{-- @include('admin.classes.partials.edit_nav') --}}
<div class="p-md">
  @include('admin.fields.partials.class_info')
  <div class="panel panel-danger">
    <div class="panel-heading">
      <i class="fa fa-trash"></i> {{trans('admin/fields.remove')}} <small>({{$class->name}} / {{$field->name}})</small>
    </div>
    <div class="panel-body">
      {!! Form::open(array('route' => ['admin.fields.remove', $field->id], 'class' => 'form-horizontal')) !!}
        <input type="hidden" name="id" value="{{$field->id}}">
        <input type="hidden" name="class_id" value="{{$class->id}}">
        <div class="form-group">
          <div class="col-md-10 col-md-offset-2">
            <div class="text-danger">
              <i class="fa fa-exclamation-circle"></i> {{trans('admin/fields.remove_confirmation')}}
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-10 col-md-offset-2">
            <a href="{{route('admin.fields.edit', ['class_id'=>$class->id, 'field_id'=>$field->id])}}" class="btn btn-default"><i class="fa fa-pencil-square-o"></i> {{trans('admin/fields.edit')}}</a>
            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> {{trans('admin/fields.remove')}}</button>
          </div>
        </div>

      {!! Form::close() !!}
    </div>
  </div>
</div>

@stop
