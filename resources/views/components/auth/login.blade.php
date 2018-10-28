@extends('layouts.main')
@include('_partials.seo2')
@section('page')
<div class="row xs-pt-50">
  <div class="col-md-6 col-md-push-3 col-lg-4 col-lg-push-4">
    <div class="panel panel-default">
      <div class="panel-body">
          {{Form::open(['url'=>lPath('/auth/sign-in'), 'method'=>'post'])}}

          <input type="hidden" name="back" value="{{ request('back') }}">

          {!! app('captcha')->render(); !!}
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

            <div class="form-group">
              <button type="submit" class="btn btn-warning">{{__('Login')}}</button>
              <a href="{{url(lPath('/auth/register'))}}?back={{ request('back') }}" class="btn btn-default">{{__('Register')}}</a>
              {{-- <a href="{{ $facebookLoginUrl }}" class="btn btn-default btn-facebook"><i class="fa fa-facebook"></i></a> --}}
            </div>

            <a href="{{url(lPath('/auth/reset'))}}">{{__('Reset password')}}</a>
          {{Form::close()}}
          
      </div>
    </div>
  </div>
</div>
@endsection
