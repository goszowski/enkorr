@extends('layouts.main')
@include('_partials.seo2')
@section('page')
<div class="row xs-pt-50">
  <div class="col-md-6 col-md-push-3 col-lg-4 col-lg-push-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        {{__('Settings')}}
      </div>
      <div class="panel-body">
          {{Form::open(['url'=>lPath('/auth/update'), 'method'=>'post'])}}

            {!! app('captcha')->render(); !!}
            <div class="form-group {{$errors->has('name') ? ' has-error' : ''}}">
              <label for="name">{{__('Your Name')}}</label>
              <input class="form-control" type="text" name="name" id="name" value="{{$currentFields->name}}">
              @if($errors->has('name'))
                <span class="help-block">
                  <strong>{{$errors->first('name')}}</strong>
                </span>
              @endif
            </div>

            <div class="form-group {{$errors->has('email') ? ' has-error' : ''}}">
              <label for="email">{{__('Email')}}</label>
              <input class="form-control" type="text" name="email" id="email" value="{{$currentFields->email}}">
              @if($errors->has('email'))
                <span class="help-block">
                  <strong>{{$errors->first('email')}}</strong>
                </span>
              @endif
            </div>

            <label>
              <input type="checkbox" name="edit_password" onclick="$('#password-toggle').toggleClass('hidden'); $('.pwd-field').prop('disabled', (_, val) => !val);" @if($errors->has('old_password') or $errors->has('new_password') or $errors->has('new_password_confirmation')) checked @endif> {{__('Edit password')}}
            </label>

            <div class="@if(!$errors->has('old_password') and !$errors->has('new_password') and !$errors->has('new_password_confirmation')) hidden @endif" id="password-toggle">
              <div class="form-group {{$errors->has('old_password') ? ' has-error' : ''}}">
                <label for="old_password">{{__('Old password')}}</label>
                <input class="form-control pwd-field" type="password" name="old_password" id="old_password" @if(!$errors->has('old_password') and !$errors->has('new_password') and !$errors->has('new_password_confirmation')) disabled @endif value="">
                @if($errors->has('old_password'))
                  <span class="help-block">
                    <strong>{{$errors->first('old_password')}}</strong>
                  </span>
                @endif
              </div>

              <div class="form-group {{$errors->has('new_password') ? ' has-error' : ''}}">
                <label for="new_password">{{__('New password')}}</label>
                <input class="form-control pwd-field" type="password" name="new_password" id="new_password" @if(!$errors->has('old_password') and !$errors->has('new_password') and !$errors->has('new_password_confirmation')) disabled @endif value="">
                @if($errors->has('new_password'))
                  <span class="help-block">
                    <strong>{{$errors->first('new_password')}}</strong>
                  </span>
                @endif
              </div>

              <div class="form-group {{$errors->has('new_password_confirmation') ? ' has-error' : ''}}">
                <label for="new_password_confirmation">{{__('New password confirmation')}}</label>
                <input class="form-control pwd-field" type="password" name="new_password_confirmation" id="new_password_confirmation" @if(!$errors->has('old_password') and !$errors->has('new_password') and !$errors->has('new_password_confirmation')) disabled @endif value="">
                @if($errors->has('new_password_confirmation'))
                  <span class="help-block">
                    <strong>{{$errors->first('new_password_confirmation')}}</strong>
                  </span>
                @endif
              </div>
            </div>


            <div class="form-group">
              <button type="submit" class="ladda-button btn btn-warning">{{__('Update')}}</button>
              <a href="{{url(lPath('/auth/logout'))}}" class="ladda-button btn btn-default">{{__('Logout')}}</a>
            </div>

          {{Form::close()}}
      </div>
    </div>
  </div>
</div>
@endsection
