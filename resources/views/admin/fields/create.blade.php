@extends('admin.app')
@section('content')
{{-- @include('admin.classes.partials.edit_nav') --}}

<div class="p-md">
  @include('admin.fields.partials.class_info')
  @include('admin.classes.partials.new_nav')
  <div class="p b-a no-b-t bg-white m-b tab-content">
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


@stop
