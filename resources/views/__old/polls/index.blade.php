@extends('layouts.main')

@include('partials.seo2')

@section('section')
  @include('partials.title')
  <div class="sm-pl-15 sm-pr-15">
      <div class="row">
          <div class="col-xs-12 xs-pt-30">
            <h2 class="column-title">{{$fields->name}}</h2>
          </div>
      </div>
      <div class="row all-publications">
          <section class="col-md-9 sidebar sticky sticky-sm sticky-lg">
                <ul class="sidebar-list"> {{--sidebar-list--}}
                  @if(count($polls))
                    @foreach( $polls as $k => $poll )
                      <li>
                          <a href="{{ lPath($poll->node->absolute_path) }}" data-ajax="true" class="ripple" data-ripple-color="#eee">
                            <span>
                              <b>{{ $poll->name }}</b>
                            </span>
                          </a>
                      </li>
                    @endforeach
                  @endif
                </ul>
            </section>
            <div class="col-lg-3 sticky sticky-sm sticky-lg">

              @include('partials.publications')

            </div>
        </div>
    </div>
@endsection
