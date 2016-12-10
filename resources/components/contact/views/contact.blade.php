@extends('layouts.main')

@include('partials.seo')

{{-- Page content --}}
@section('content')

  <h1>{{$currentFields->name}}</h1>

  <p>
    <b>{{__('Address')}}</b><br>
    {!! str_replace("\n", '<br>', $currentFields->address) !!}
  </p>

  <p>
    <b>{{__('Phone')}}</b><br>
    {!! str_replace("\n", '<br>', $currentFields->phone) !!}
  </p>

  <p>
    <b>{{__('Email')}}</b><br>
    {!! str_replace("\n", '<br>', $currentFields->email) !!}
  </p>

  {!! Form::open(['url'=>lPath('/contact/send'), 'method'=>'post']) !!}
  <div class="row">
    <div class="col-md-6">
      <div class="form-group {{$errors->has('name') ? ' has-error' : ''}}">
        <label for="name">{{__('Name')}}</label>
        <input type="text" id="name" name="name" class="form-control input-lg" value="{{old('name')}}" placeholder="{{__('Name')}}" required="">
        @if($errors->has('name'))
          <span class="help-block">
            <strong>{{$errors->first('name')}}</strong>
          </span>
        @endif
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group {{$errors->has('email') ? ' has-error' : ''}}">
        <label for="email">{{__('Email')}}</label>
        <input type="email" id="email" name="email" class="form-control input-lg" value="{{old('email')}}" placeholder="{{__('Email')}}" required="">
        @if($errors->has('email'))
          <span class="help-block">
            <strong>{{$errors->first('email')}}</strong>
          </span>
        @endif
      </div>
    </div>
  </div>

  <div class="form-group {{$errors->has('text') ? ' has-error' : ''}}">
    <label for="">{{__('Message')}}</label>
    <textarea name="text" class="form-control input-lg" rows="8" placeholder="{{__('Message')}}...">{{old('text')}}</textarea>
    @if($errors->has('text'))
      <span class="help-block">
        <strong>{{$errors->first('text')}}</strong>
      </span>
    @endif
  </div>

  <div class="xs-pt-10 xs-pb-10">
    <button type="submit" class="btn btn-primary btn-lg">{{__('Send Message')}}</button>
  </div>
  {!! Form::close() !!}


@endsection
{{-- [END] Page content --}}
