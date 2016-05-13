@extends('layouts.main')

@include('partials.seo')

{{-- Page content --}}
@section('content')

  <div class="text-center">
    <br><br><br>
    <h1 class="h3">runsite::CMS website</h1>

    @foreach(PH::getLangs() as $k=>$lang)
      <a href="{{asset($lang->locale)}}">{{$lang->name}}</a>
      @if(++$k < count(PH::getLangs())) / @endif
    @endforeach
  </div>

@endsection
{{-- [END] Page content --}}
