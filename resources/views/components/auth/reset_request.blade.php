@extends('layouts.main')
@include('_partials.seo2')
@section('page')
<div class="row xs-pt-50">
  <div class="col-md-6 col-md-push-3 col-lg-4 col-lg-push-4">
    <div class="panel panel-default">
      <div class="panel-body text-center">
        <div class="alert alert-success">
          {{__('We have e-mailed your password reset link')}}
        </div>
        <a href="{{url(lPath('/'))}}" class="btn btn-warning">{{__('Okay')}}</a>
      </div>
    </div>
  </div>
</div>
@endsection
