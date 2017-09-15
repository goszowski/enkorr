@extends('layouts.main')
@section('section')
  <div class="xs-pl-0 xs-pr-0 sm-pl-15 sm-pr-15">
      <div class="row">
          <div class="col-lg-9 sticky sticky-sm sticky-lg xs-pt-30">
              <h1 class="h3 xs-mt-0">
                  <b>{{ $fields->name }}</b>
              </h1>
              <p><b>{{ $fields->title }}</b></p>

              <div class="publication-text">

                {!! $fields->content !!}

              </div>
          </div>
          <div class="col-lg-3 sticky sticky-sm sticky-lg xs-pt-30">
            Banner Here
            {{-- @if(count($banners))
              @foreach ($banners as $key => $banner)

              @endforeach
            @endif --}}
          </div>
      </div>
  </div>
@endsection
