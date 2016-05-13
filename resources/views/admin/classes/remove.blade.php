

@extends('admin.app')
@section('content')

@include('admin.classes.partials.edit_nav')

<div class="p-md">
  <div class="panel panel-danger">
    <div class="panel-heading">
      <i class="fa fa-trash"></i> {{trans('admin/classes.remove')}}
    </div>
    <div class="panel-body">
      @if($errors->first('id'))
        <div class="alert alert-danger">{{$errors->first('id')}}</div>
      @endif
      {!! Form::open(array('route' => 'admin.classes.remove', 'class' => 'form-horizontal')) !!}
        <input type="hidden" name="id" value="{{$class->id}}">
        <div class="form-group">
          <div class="col-md-10 col-md-offset-2">
            <div class="text-danger">
              <i class="fa fa-exclamation-circle"></i> {{trans('admin/classes.are_you_sure')}}?
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-10 col-md-offset-2">
            <a href="{{route('admin.classes.edit', $class->id)}}" class="btn btn-default"><i class="fa fa-pencil-square-o"></i> {{trans('admin/classes.edit')}}</a>
            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> {{trans('admin/classes.remove')}}</button>
          </div>
        </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>

@stop
