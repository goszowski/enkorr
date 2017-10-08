@extends('layouts.main')

@include('partials.seo2')

@section('section')
  @include('partials.title')
<div class="sm-pl-15 sm-pr-15">
    <div class="row all-publications">
        <section class="col-md-9 sidebar xs-pt-30 sticky sticky-sm sticky-lg">
            <h2 class="column-title">{{$fields->name}}</h2>
            <ul class=""> {{--sidebar-list--}}
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
    </div>
</div>
@endsection
