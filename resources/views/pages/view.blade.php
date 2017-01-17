@extends('layouts.main')

@include('partials.seo')

{{-- Page content --}}
@section('content')

  <div class="container">
    <h1>{{$currentFields->name}}</h1>
    {!! $currentFields->content !!}
  </div>

@endsection
{{-- [END] Page content --}}
