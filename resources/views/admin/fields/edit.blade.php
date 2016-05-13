@extends('admin.app')
@section('content')
@include('admin.classes.partials.edit_nav')
<div class="p-md">
  @include('admin.fields.partials.class_info')
  <div class="panel panel-default">
    <div class="panel-heading bg-white">
      <i class="fa fa-pencil-square-o"></i> {{trans('admin/fields.edit')}} <small class="text-muted">({{$class->name}} / {{$field->name}})</small>
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

      {!! Form::open(array('route' => ['admin.fields.update', $class->id], 'class' => 'form-horizontal')) !!}
        <input type="hidden" name="class_id" value="{{$class->id}}">
        <input type="hidden" name="id" value="{{$field->id}}">
        <input type="hidden" name="old_shortname" value="{{$field->shortname}}">
        <input type="hidden" name="old_type_id" value="{{$field->type_id}}">
        @include('admin.fields.partials.formfields')
        <div class="form-group">
          <div class="col-md-10 col-md-offset-2">
            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {{trans('admin/fields.update')}}</button>
            <a href="{{route('admin.fields.remove_confirmation', ['class_id'=>$class->id, 'field_id'=>$field->id])}}" class="btn btn-raised btn-danger"><i class="fa fa-trash"></i> {{trans('admin/fields.remove')}}</a>
          </div>
        </div>

      {!! Form::close() !!}
    </div>
  </div>
</div>

@stop
