@extends('admin.app')
@section('content')
{{-- @include('admin.classes.partials.edit_nav') --}}
<div class="p-md">
  @include('admin.fields.partials.class_info')
  @include('admin.classes.partials.new_nav')
  <div class="p b-a no-b-t bg-white m-b tab-content">
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

      {!! Form::open(array('route' => ['admin.fields.settings.update', $class->id, $field->id], 'class' => 'form-horizontal')) !!}
        <input type="hidden" name="class_id" value="{{$class->id}}">
        <input type="hidden" name="id" value="{{$field->id}}">
        <div class="form-group">
          <label class="col-md-2 control-label">{{trans('admin/fields.name')}}</label>
          <div class="col-md-10" style="padding-top: 5px;">
            <span class="label bg-success">{{$field->name}}</span>
          </div>
        </div>
        @if($settings)
          @foreach($settings as $key=>$item)
              @if($item->_parameter == 'db_field_size')
                <input type="hidden" name="old_db_field_size" value="{{$item->_value}}">
              @endif
              @include('admin.fields.partials.settings.'.$item['control'])
          @endforeach
        @endif
        <div class="form-group">
          <div class="col-md-10 col-md-offset-2">
            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {{trans('admin/fields.update')}}</button>
          </div>
        </div>

      {!! Form::close() !!}
  </div>
</div>

@stop
