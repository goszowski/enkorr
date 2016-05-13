@extends('admin.app')
@section('content')
@include('admin.classes.partials.edit_nav')

<div class="p-md">
  @include('admin.fields.partials.class_info')
  <div class="panel panel-default">
    <div class="panel-heading bg-white">
      <i class="fa fa-plus"></i> {{trans('admin/fields.create')}} <small class="text-muted">({{$class->name}})</small>
    </div>
    <div class="panel-body">
      {!! Form::open(array('route' => ['admin.fields.store', $class->id], 'class' => 'form-horizontal')) !!}
        <input type="hidden" name="class_id" value="{{$class->id}}">
        <fieldset>
          @include('admin.fields.partials.formfields')
          <div class="form-group">
            <div class="col-md-10 col-md-offset-2">
              <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {{trans('admin/fields.create')}}</button>
            </div>
          </div>
        </fieldset>
      {!! Form::close() !!}
    </div>
  </div>
</div>


@stop
