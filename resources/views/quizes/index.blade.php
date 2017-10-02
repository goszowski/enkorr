@extends('layouts.main')

@include('partials.seo2')

@section('section')
<div class="sm-pl-15 sm-pr-15">
    <div class="row all-publications">
        <section class="col-md-9 sidebar xs-pt-30 sticky sticky-sm sticky-lg">
            <h2 class="column-title">{{$fields->name}}</h2>
            <ul class="sidebar-list">
              @if(count($quizes))
                @foreach( $quizes as $k => $quiz )
                  <li>
                      <a href="{{ lPath($quiz->node->absolute_path) }}" data-ajax="true" class="ripple" data-ripple-color="#eee">
                        <span>
                          <b>{{ $quiz->name }}</b>
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
