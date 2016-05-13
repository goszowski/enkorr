@extends('admin.app')
@section('content')
@include('admin.languages.partials.items_nav')

<div class="p-md">
  <div class="panel panel-default">
    <div class="panel-heading bg-white">
      <i class="fa fa-pencil-square-o"></i> {{trans('admin/languages.edit')}}
    </div>
    <div class="panel-body">
      @if(Session::has('success'))
        <!-- <div class="alert alert-success">{!! session('success') !!}</div> -->
        <script type="text/javascript">
          $(function(){
            Lobibox.notify('success', {
              position: 'top right',
              msg: '{!! session("success") !!}',
              delay: false,
            });

          });
        </script>
      @endif

      @if($errors->any())
      <script type="text/javascript">
        $(function(){
          Lobibox.notify('error', {
            position: 'top right',
            msg: 'Some fields has error',
            delay: false,
          });

        });
      </script>
      @endif

      @if($errors->first('id'))
        <div class="alert alert-danger">{{$errors->first('id')}}</div>
      @endif
      {!! Form::open(array('route' => 'admin.languages.update', 'class' => 'form-horizontal')) !!}
      <input type="hidden" name="id" value="{{$lang->id}}">
        <fieldset>
          @include('admin.languages.partials.formfields')
          <div class="form-group">
            <div class="col-md-10 col-md-offset-2">
              <button type="submit" class="btn btn-dark"><i class="fa fa-check"></i> {{trans('admin/languages.update')}}</button>
              <a href="{{route('admin.languages.remove_confirmation', $lang->id)}}" class="btn btn-raised btn-danger"><i class="fa fa-trash"></i> {{trans('admin/languages.remove')}}</a>
            </div>
          </div>
        </fieldset>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@stop
