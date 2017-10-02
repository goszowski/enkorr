@extends('layouts.main')

@include('partials.seo2')

{{-- Page content --}}
@section('content')
    @include('partials.title')

  <div class="container">
    <h1>{{$fields->name}}</h1>
    {!! $fields->content !!}
  </div>

@endsection
{{-- [END] Page content --}}
