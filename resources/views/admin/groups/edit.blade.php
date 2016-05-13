@extends('admin.app')
@section('content')

@include('admin.classes.partials.edit_nav')


<div class="p-md">
  @include('admin.fields.partials.class_info')
  <div class="panel panel-default">
    <div class="panel-heading bg-white">
      <i class="fa fa-pencil-square-o"></i> {{trans('admin/groups.edit')}} <small class="text-muted">({{$class->name}})</small>
    </div>
    <div class="panel-body">
      @if(Session::has('success'))
        <!-- <div class="alert alert-success">{!! session('success') !!}</div> -->
        <script type="text/javascript">
          $(function(){
            $.notify({
            	message: '{!! session("success") !!}'
            },{
            	type: 'success',
              offset: {
            		x: 20,
            		y: 70
            	},
              delay: 6000
            });
          });
        </script>
      @endif

      {!! Form::open(array('route' => ['admin.groups.update', $class->id], 'class' => 'form-horizontal')) !!}
        <input type="hidden" name="id" value="{{$group->id}}">
        <input type="hidden" name="class_id" value="{{$class->id}}">
        <fieldset>

          <div class="form-group  @if($errors->has('name')) has-warning @endif">
            <label for="field_name" class="col-md-2 control-label">{{trans('admin/groups.name')}}</label>
            <div class="col-md-10">
              <input class="form-control" type="text" name="name" id="field_name" value="@if(Request::old('name')){{Request::old('name')}}@else{{isset($group) ? $group->name : ''}}@endif">
              @if($errors->first('name'))<small class="text-danger">{{$errors->first('name')}}</small>@endif
            </div>
          </div>


          <div class="form-group">
            <div class="col-md-10 col-md-offset-2">
              <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {{trans('admin/groups.update')}}</button>
              <a class="btn btn-danger" href="{{route('admin.groups.remove_confirmation', ['class_id'=>$class->id, 'group_id'=>$group->id])}}"><i class="fa fa-trash"></i> {{trans('admin/groups.remove')}}</a>
            </div>
          </div>
        </fieldset>
      {!! Form::close() !!}
    </div>

  </div>
</div>
@stop
