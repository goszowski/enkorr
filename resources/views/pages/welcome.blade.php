@extends('layouts.main')

@include('partials.seo')

{{-- Page content --}}
@section('content')

  <div class="text-center">
    <br><br><br>
    <hr>
    <h1 class="h3">runsite::CMF website</h1>
    <a href="{{url('/panel-admin')}}" class="btn btn-primary">Panel Admin</a>

    @foreach(Model('section')->get() as $item)
      <div>
        {{$item->name}}
        @if($item->has('page'))
          <small><b>Сторінка: </b>{{$item->page->name}}</small>
        @endif
        <hr>
      </div>
    @endforeach
    <br><br><br>
    {{__('Трололо')}}

  </div>

@endsection
{{-- [END] Page content --}}
