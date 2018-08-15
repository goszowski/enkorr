@extends('layouts.main')
@include('_partials.seo2')
@section('page')
<div class="row xs-pt-50">
  <div class="col-md-6 col-md-push-3 col-lg-4 col-lg-push-4">
    <div class="panel panel-default">
      <div class="panel-body">
          {{Form::open(['url'=>lPath('/auth/sign-up'), 'method'=>'post'])}}

          {!! app('captcha')->render(); !!}
            <div class="form-group {{$errors->has('name') ? ' has-error' : ''}}">
              <label for="name">{{__('Your Name')}}</label>
              <input class="form-control" type="text" name="name" id="name" value="{{old('name')}}">
              @if($errors->has('name'))
                <span class="help-block">
                  <strong>{{$errors->first('name')}}</strong>
                </span>
              @endif
            </div>

            <div class="form-group {{$errors->has('email') ? ' has-error' : ''}}">
              <label for="email">{{__('Email')}}</label>
              <input class="form-control" type="text" name="email" id="email" value="{{old('email')}}">
              @if($errors->has('email'))
                <span class="help-block">
                  <strong>{{$errors->first('email')}}</strong>
                </span>
              @endif
            </div>

            <div class="form-group {{$errors->has('password') ? ' has-error' : ''}}">
              <label for="password">{{__('Password')}}</label>
              <input class="form-control" type="password" name="password" id="password" value="">
              @if($errors->has('password'))
                <span class="help-block">
                  <strong>{{$errors->first('password')}}</strong>
                </span>
              @endif
            </div>

            <div class="form-group {{$errors->has('password_confirmation') ? ' has-error' : ''}}">
              <label for="password_confirmation">{{__('Password Confirmation')}}</label>
              <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" value="">
              @if($errors->has('password_confirmation'))
                <span class="help-block">
                  <strong>{{$errors->first('password_confirmation')}}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-warning">{{__('Register')}}</button>
              <a href="{{url(lPath('/auth/login'))}}" class="btn btn-default">{{__('Login')}}</a>
              <a href="{{ $facebookLoginUrl }}" class="btn btn-default btn-facebook"><i class="fa fa-facebook"></i></a>
            </div>
          {{Form::close()}}
      </div>
    </div>
  </div>
</div>
@endsection
