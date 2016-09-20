@extends('layouts.main')

@include('partials.seo')

{{-- Page content --}}
@section('content')

  <div class="text-center">
    <br><br><br>
    <hr>
    <h1 class="h3">runsite::CMF website</h1>
    <a href="{{url('/panel-admin')}}" class="btn btn-primary">Panel Admin</a>

    @foreach(Model('test_section')->get() as $item)
      <div>
        {{$item->name}}
        @if($item->hasMore('test_sub_section'))
          @foreach($item->test_sub_sections as $subitem)
            <br> - {{$subitem->name}}
          @endforeach
        @endif
        <hr>
      </div>
    @endforeach
    <br><br><br>

    @foreach(Model('test_section')->get() as $item)
      <div>
        {{$item->name}}
        @if($item->hasMore('test_sub_section'))
          @foreach($item->test_sub_sections as $subitem)
            <br> - {{$subitem->name}}
          @endforeach
        @endif
        <hr>
      </div>
    @endforeach
    <br><br><br>

    @foreach(Model('test_section')->get() as $item)
      <div>
        {{$item->name}}
        @if($item->hasMore('test_sub_section'))
          @foreach($item->test_sub_sections as $subitem)
            <br> - {{$subitem->name}}
          @endforeach
        @endif
        <hr>
      </div>
    @endforeach
    <br><br><br>

    @foreach(Model('referat')->get() as $item)
      <div>
        {{$item->name}}
        @if($item->has('section'))
          - {{$item->section->name}}
        @endif
        <hr>
      </div>
    @endforeach

    <br><br><br>
    @foreach(Model('referat')->get() as $item)
      <div>
        {{$item->name}}
        @if($item->has('section'))
          - {{$item->section->name}}
        @endif
        <hr>
      </div>
    @endforeach

    <br><br><br>
    @foreach(Model('referat')->get() as $item)
      <div>
        {{$item->name}}
        @if($item->has('section'))
          - {{$item->section->name}}
        @endif
        <hr>
      </div>
    @endforeach
  </div>

@endsection
{{-- [END] Page content --}}
