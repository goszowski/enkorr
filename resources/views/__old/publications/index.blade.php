@extends('layouts.main')

@include('partials.seo2')

@section('top-banner')
  @include('banners.up')
@endsection

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

            <ul class="sidebar-list first-image">
              @if(count( $publications ))
                @foreach( $publications as $k => $publication )
                  <li>
                      <a href="{{ lPath($publication->node->absolute_path) }}" data-ajax="true" class="ripple" data-ripple-color="#eee">
                          <img src="{{asset($publication->image_from_gallery)}}" alt="">
                          <span>
                            @if($publication->parent_id == config('public.sections.news'))
                              <time datetime="/* publication datetime */">
                                  {{PH::formatDateTime($publication->pubdate, false, true)}}
                                  @if( $publication->pinned )
                                    <i class="fa fa-star text-primary xs-ml-5 animated animated-xs bounceIn"></i>
                                  @endif
                              </time>
                              @if( $publication->bold )
                                <b>{{ $publication->name }}</b>
                              @else
                                {{ $publication->name }}
                              @endif
                            @else
                              <time datetime="/* publication datetime */">
                                {{PH::formatDateTime($publication->pubdate, false, true)}}
                              </time>
                              <b>{{ $publication->name }}</b>
                            @endif
                          </span>
                      </a>
                  </li>
                @endforeach
              @endif
            </ul>

            {{$publications->links()}}

            @include('banners.down')

        </section>

        <div class="col-lg-3 sticky sticky-sm sticky-lg">

          @include('banners.right')

        </div>

    </div>
</div>
@endsection
