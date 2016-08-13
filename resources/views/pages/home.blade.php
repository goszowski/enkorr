@extends('layouts.main')

@include('partials.seo')

{{-- Page content --}}
@section('content')

  <div class="text-center">
    <br><br><br>
    <hr>
    <h1 class="h3">runsite::CMS website</h1>

    @foreach(PH::getLangs() as $k=>$lang)
      <a href="{{asset($lang->locale)}}">{{$lang->name}}</a>
      @if(++$k < count(PH::getLangs())) / @endif
    @endforeach

    <hr>
    @if(isset($pages))
      @foreach($pages as $page)
        <a href="{{PH::lPath($page->node->absolute_path)}}">{{$page->name}} - @if($page->relationTo('section', 'aaw')) {{$page->relationTo('section', 'aaw')->name}} @endif</a>
      @endforeach
    @else
      <div class="alert alert-danger">
        empty
      </div>
    @endif
  </div>

@endsection
{{-- [END] Page content --}}
