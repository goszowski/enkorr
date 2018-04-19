@extends('layouts.main')
@include('_partials.seo2')
@section('page')
<div class="row xs-pt-50">
  <div class="col-md-6 col-md-push-3 col-lg-4 col-lg-push-4">
    <div class="panel panel-default">
      <div class="panel-body">
          {{Form::open(['url'=>lPath('/auth/reset-action'), 'method'=>'post'])}}
            <input type="hidden" name="reset_token" value="{{$request->input('token')}}">
            <div class="form-group {{$errors->has('email') ? ' has-error' : ''}}">
              <label for="email">{{__('Email')}}</label>
              <input class="form-control" type="text" name="email" id="email" value="{{$request->input('email')}}" readonly="">
              @if($errors->has('email'))
                <span class="help-block">
                  <strong>{{$errors->first('email')}}</strong>
                </span>
              @endif
            </div>

            <div class="form-group {{$errors->has('password') ? ' has-error' : ''}}">
              <label for="password">{{__('New Password')}}</label>
              <input class="form-control" type="password" name="password" id="password" value="">
              @if($errors->has('password'))
                <span class="help-block">
                  <strong>{{$errors->first('password')}}</strong>
                </span>
              @endif
            </div>

            <div class="form-group {{$errors->has('password_confirmation') ? ' has-error' : ''}}">
              <label for="password_confirmation">{{__('New Password Confirmation')}}</label>
              <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" value="">
              @if($errors->has('password_confirmation'))
                <span class="help-block">
                  <strong>{{$errors->first('password_confirmation')}}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-warning">{{__('Reset')}}</button>
            </div>
          {{Form::close()}}
      </div>
    </div>
  </div>
</div>
@endsection
