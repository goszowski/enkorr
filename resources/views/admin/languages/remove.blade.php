@extends('admin.app')
@section('content')
{{-- @include('admin.languages.partials.items_nav') --}}

<div class="p-md">
  <div class="panel panel-danger">
    <div class="panel-heading">
      <i class="fa fa-trash"></i> {{trans('admin/languages.remove')}}
    </div>
    <div class="panel-body">
      @if($errors->first('id'))
        <div class="alert alert-danger">{{$errors->first('id')}}</div>
      @endif
      {!! Form::open(array('route' => 'admin.languages.remove', 'class' => 'form-horizontal')) !!}
        <input type="hidden" name="id" value="{{$lang->id}}">
        <div class="form-group">
          <div class="col-md-10 col-md-offset-2">
            <div class="text-danger">
              <i class="fa fa-exclamation-circle"></i> {{trans('admin/languages.are_you_sure')}}?
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-10 col-md-offset-2">
            <a href="{{route('admin.languages.edit', $lang->id)}}" class="btn btn-dark"><i class="fa fa-pencil-square-o"></i> {{trans('admin/languages.edit')}}</a>
            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> {{trans('admin/languages.remove')}}</button>
          </div>
        </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>

@stop
