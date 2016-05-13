@extends('admin.app')
@section('content')
@include('admin.nodes.partials.items_nav')
<div class="p-md">
  <div class="panel panel-default">
    <div class="panel-heading bg-white">
      <i class="fa fa-cog"></i> {{trans('admin/nodes.settings')}}
    </div>
    <div class="panel-body">
      {!! Form::open(['route' => 'admin.nodes.settings.update', 'class' => 'form-horizontal']) !!}
      <input type="hidden" name="node_id" value="{{$node->id}}">

      @if(! $node->isHome())
      <div class="form-group  @if($errors->has('shortname')) has-warning @endif">
        <label for="field_shortname" class="col-md-2 control-label">{{trans('admin/nodes.shortname')}}</label>
        <div class="col-md-10">
          <input class="form-control" type="text" name="shortname" id="field_shortname" value="@if(Request::old('shortname')){{Request::old('shortname')}}@else{{isset($node) ? $node->shortname : ''}}@endif">
          @if($errors->first('shortname'))<small class="text-danger">{{$errors->first('shortname')}}</small>@endif
        </div>
      </div>
      @endif

      <div class="form-group  @if($errors->has('controller')) has-warning @endif">
        <label for="field_controller" class="col-md-2 control-label">{{trans('admin/nodes.controller')}}</label>
        <div class="col-md-10">
          <input class="form-control" type="text" name="controller" id="field_controller" value="@if(Request::old('controller')){{Request::old('controller')}}@else{{isset($node) ? $node->controller : ''}}@endif">
          <small class="text-muted"><i class="fa fa-info-circle text-info"></i> {{trans('admin/classes.controller@method')}}</small>
          @if($errors->first('controller'))<small class="text-danger">{{$errors->first('controller')}}</small>@endif
        </div>
      </div>

      <div class="form-group  @if($errors->has('controller')) has-warning @endif">
        <div class="col-md-10 col-md-push-2">
          <button type="submit" class="btn btn-dark">{{trans('admin/nodes.update')}}</button>
        </div>
      </div>

      {!! Form::close() !!}
    </div>
  </div>
</div>
@stop
