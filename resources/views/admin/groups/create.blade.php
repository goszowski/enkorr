@extends('admin.app')
@section('content')

{{-- @include('admin.classes.partials.edit_nav') --}}


<div class="p-md">
  @include('admin.fields.partials.class_info')
  @include('admin.classes.partials.new_nav')
  <div class="p b-a no-b-t bg-white m-b tab-content">
      {!! Form::open(array('route' => ['admin.groups.store', $class->id], 'class' => 'form-horizontal')) !!}
        <input type="hidden" name="class_id" value="{{$class->id}}">
        <fieldset>

          <div class="form-group  @if($errors->has('name')) has-warning @endif">
            <label for="field_name" class="col-md-2 control-label">{{trans('admin/groups.name')}}</label>
            <div class="col-md-10">
              <input class="form-control" type="text" name="name" id="field_name" value="@if(Request::old('name')){{Request::old('name')}}@else{{isset($field) ? $field->name : ''}}@endif" autofocus>
              @if($errors->first('name'))<small class="text-danger">{{$errors->first('name')}}</small>@endif
            </div>
          </div>


          <div class="form-group">
            <div class="col-md-10 col-md-offset-2">
              <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {{trans('admin/groups.create')}}</button>
            </div>
          </div>
        </fieldset>
      {!! Form::close() !!}

  </div>
</div>
@stop
