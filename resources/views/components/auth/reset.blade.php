@extends('layouts.main')
@include('partials.seo')
@section('section')
<div class="row xs-pt-50">
    <div class="col-md-6 col-md-push-3 col-lg-4 col-lg-push-4">
      <div class="panel panel-default">
        <div class="panel-body">
            {{Form::open(['url'=>lPath('/auth/send-reset-request'), 'method'=>'post'])}}
              <div class="alert alert-success">
                {{__('Enter Email Address')}}
              </div>
              <div class="form-group {{$errors->has('email') ? ' has-error' : ''}}">
                <label for="email">{{__('Email')}}</label>
                <input class="form-control" type="text" name="email" id="email" value="{{old('email')}}" autofocus>
                @if($errors->has('email'))
                  <span class="help-block">
                    <strong>{{$errors->first('email')}}</strong>
                  </span>
                @endif
              </div>


              <div class="form-group">
                <button type="submit" class="btn btn-primary">{{__('Send request')}}</button>
                <a href="{{url(lPath('/auth/login'))}}" class="btn btn-default">{{__('Login')}}</a>
              </div>

            {{Form::close()}}
        </div>
      </div>
    </div>
  </div>
@endsection
