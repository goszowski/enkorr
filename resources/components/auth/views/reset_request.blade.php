@extends('layouts.main')
@include('partials.seo')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-push-3 col-lg-4 col-lg-push-4">
      <div class="panel panel-default">
        <div class="panel-body text-center">
          <div class="alert alert-success">
            {{__('We have e-mailed your password reset link')}}
          </div>
          <a href="{{url(lPath('/'))}}" class="btn btn-success">{{__('Okay')}}</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
