@extends('layouts.main')

@include('partials.seo2')

{{-- Page content --}}
@section('section')
    @include('partials.title')

    <div class="page-content xs-pt-30">
        <h1 class="h2 column-title">{{$fields->name}}</h1>
        {!! $fields->content !!}
    </div>

@endsection
{{-- [END] Page content --}}
