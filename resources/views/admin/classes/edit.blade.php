@extends('admin.app')
@section('content')


<div class="p-md">
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

      @if($errors->first('id'))
        <div class="alert alert-danger">{{$errors->first('id')}}</div>
      @endif
      {!! Form::open(array('route' => 'admin.classes.update', 'class' => 'form-horizontal')) !!}
        <input type="hidden" name="id" value="{{$class->id}}">
        <input type="hidden" name="old_shortname" value="{{$class->shortname}}">
        <fieldset>
          @include('admin.classes.formfields')

          <div class="row">
            <div class="col-md-8">
              <div class="form-group">
                <div class="col-md-10 col-md-offset-2">
                  <button type="submit" class="btn btn-raised btn-primary"><i class="fa fa-check"></i> {{trans('admin/classes.update')}}</button>
                  <a href="{{route('admin.classes.remove_confirmation', $class->id)}}" class="btn btn-raised btn-danger"><i class="fa fa-trash"></i> {{trans('admin/classes.remove')}}</a>
                  <a href="{{route('admin.classes.items')}}" class="btn btn-raised btn-default">{{trans('admin/classes.close')}}</a>
                </div>
              </div>
            </div>
          </div>

        </fieldset>
      {!! Form::close() !!}
  </div>
</div>

@stop
