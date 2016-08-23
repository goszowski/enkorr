@extends('layouts.main')

@include('partials.seo')

{{-- Page content --}}
@section('content')

  <div class="text-center">
    <br><br><br>
    <hr>
    <h1 class="h3">runsite::CMF website</h1>
    <a href="{{url('/panel-admin')}}" class="btn btn-primary">Panel Admin</a>
  </div>

@endsection
{{-- [END] Page content --}}
