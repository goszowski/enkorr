@extends('layouts.main')

@include('partials.seo2')

@section('top-banner')
  @include('banners.up')
@endsection

@section('section')
  @include('partials.title')
  <div class="xs-pl-0 xs-pr-0 sm-pl-15 sm-pr-15">
      <div class="row" id="sticky-wrapper" style="position: relative;">




          <section class="col-sm-6 col-md-4 col-lg-3 sidebar xs-pt-30 ">
              <h2 class="column-title">{{__('Новости')}}</h2>
              <ul class="sidebar-list first-image">
                @if(count( $news ))
                  @foreach( $news as $k => $new )
                    <li class="{{ $k >= 12 ? 'visible-xs' : null }}">
                        <a href="{{ lPath($new->node->absolute_path) }}" data-ajax="true" class="ripple" data-ripple-color="#eee">
                            <img src="{{ iPath($new->image, '600px') }}" alt="">
                            <span>
                                <time datetime="/* publication datetime */">
                                    {{PH::formatDateTime($new->pubdate, false, true)}}
                                    @if( $new->pinned )
                                      <i class="fa fa-star text-primary xs-ml-5 animated animated-xs bounceIn"></i>
                                    @endif
                                </time>
                                @if( $new->bold )
                                  <b>{{ $new->name }}</b>
                                @else
                                  {{ $new->name }}
                                @endif
                            </span>
                        </a>
                    </li>
                  @endforeach
                @endif
              </ul>
              <a href="{{ lPath('/news') }}" data-ajax="true" class="btn btn-block btn-primary btn-outline ripple" data-color="#eee">{{ __('Все новости') }}</a>
          </section>







          <div class="col-sm-6 col-md-8 col-lg-6 xs-pt-30 publications ">
              <h2 class="column-title visible-xs">{{__('Публикации')}}</h2>
              <div class="row">
                @if(count($homePubs))
                  @foreach($homePubs as $k => $homePub)
                      @if($homePub->has('publication'))
                        <div class=" @if($k % config('public.index.multiplicity') == 0) col-md-12 @else col-md-6 @endif publications-item xs-pb-15 sm-pb-30">
                            <a href="{{lPath($homePub->publication->node->absolute_path)}}" data-ajax="true" class="ripple">
                                <img src="{{iPath($homePub->publication->image, '600px')}}" alt="">
                                <span class="publications-item-detail">
                                    @if($homePub->publication->has('theme'))
                                      <span class="publication-theme">{{$homePub->publication->theme->name}}</span>
                                    @endif
                                    <h2>{{$homePub->publication->name}}</h2>
                                    {{-- <time datetime="/* publication datetime */">
                                        {{PH::formatDateTime($publication->pubdate, false, true)}}
                                    </time> --}}
                                </span>
                            </a>
                        </div>
                      @endif
                  @endforeach
                @endif
              </div>

              <div class="form-group">
                  <a href="{{lPath('/publications')}}" data-ajax="true" class="btn btn-block btn-primary btn-outline ripple" data-color="#eee">{{__('Все публикации')}}</a>
              </div>

              @include('banners.down')
          </div>








          <div class="visible-lg col-lg-3  xs-pt-30">

            @include('banners.right')

            @include('partials.poll')

            {{-- @include('partials.indicators.prices_eu')
            @include('partials.indicators.prices_ua') --}}

          </div>



      </div>
  </div>
@endsection
