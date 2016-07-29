@extends('admin.app')
@section('content')
{{-- @include('admin.languages.partials.items_nav') --}}

<div class="p-md">
  <div class="panel panel-default">
    <div class="panel-heading bg-white">
      <i class="fa fa-plus"></i> {{trans('admin/languages.create')}}
    </div>
    <div class="panel-body">
      {!! Form::open(array('route' => 'admin.languages.store', 'class' => 'form-horizontal')) !!}
        <fieldset>
          @include('admin.languages.partials.formfields')
          <div class="form-group">
            <div class="col-md-10 col-md-offset-2">
              <button type="submit" class="btn btn-dark">{{trans('admin/languages.create')}}</button>
              <a href="{{route('admin.languages.items')}}" class="btn btn-default">Close</a>
            </div>
          </div>
        </fieldset>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@stop
