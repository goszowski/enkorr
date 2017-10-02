@extends('layouts.main')

@include('partials.seo2')

@section('top-banner')
  @include('banners.up')
@endsection

@section('section')
  @include('partials.title')
  <div class="xs-pl-0 xs-pr-0 sm-pl-15 sm-pr-15">
      <div class="row" id="sticky-wrapper" style="position: relative;">




          <section class="col-sm-6 col-md-4 col-lg-3 sidebar xs-pt-30 sticky sticky-sm sticky-lg">
              <h2 class="column-title">{{__('Новости')}}</h2>
              <ul class="sidebar-list">
                @if(count( $news ))
                  @foreach( $news as $k => $new )
                    <li>
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







          <div class="col-sm-6 col-md-8 col-lg-6 xs-pt-30 publications sticky sticky-sm sticky-lg">
              <h2 class="column-title visible-xs">{{__('Публикации')}}</h2>
              <div class="row">
                @if(count($publications) and count($publications) > 4)

                  <? $i = 0; ?>
                  @foreach($publications as $k => $publication)
                    @if($k% config('public.index.multiplicity') == 0 and count($pinned_publications) and isset($pinned_publications[$i]))
                      <div class="col-md-12 publications-item xs-pb-15 sm-pb-30">
                          <a href="{{ lPath($pinned_publications[$i]->node->absolute_path) }}" data-ajax="true" class="ripple">
                              <img src="{{iPath($pinned_publications[$i]->image, '600px')}}" alt="">
                              <span class="publications-item-detail">
                                  <span class="publication-theme">{{$pinned_publications[$i]->theme}}</span>
                                  <h2>{{$pinned_publications[$i]->name}}</h2>
                                  {{-- <time datetime="/* publication datetime */">
                                      {{PH::formatDateTime($pinned_publications[$i]->pubdate, false, true)}}
                                  </time> --}}
                              </span>
                          </a>
                      </div>
                      <? $i++; ?>
                    @endif
                    <div class="col-md-6 publications-item xs-pb-15 sm-pb-30">
                        <a href="{{lPath($publication->node->absolute_path)}}" data-ajax="true" class="ripple">
                            <img src="{{iPath($publication->image, '600px')}}" alt="">
                            <span class="publications-item-detail">
                                <span class="publication-theme">{{$publication->theme}}</span>
                                <h2>{{$publication->name}}</h2>
                                {{-- <time datetime="/* publication datetime */">
                                    {{PH::formatDateTime($publication->pubdate, false, true)}}
                                </time> --}}
                            </span>
                        </a>
                    </div>
                  @endforeach

                @elseif(count($publications) and count($publications) <= 4)
                  @if(empty($pinned_publications[0]) == false)
                    <div class="col-md-12 publications-item xs-pb-15 sm-pb-30">
                        <a href="{{ lPath($pinned_publications[0]->node->absolute_path) }}" data-ajax="true" class="ripple">
                            <img src="{{iPath($pinned_publications[0]->image, '600px')}}" alt="">
                            <span class="publications-item-detail">
                                <span class="publication-theme">{{$pinned_publications[0]->theme}}</span>
                                <h2>{{$pinned_publications[0]->name}}</h2>
                                {{-- <time datetime="/* publication datetime */">
                                    {{PH::formatDateTime($pinned_publications[0]->pubdate, false, true)}}
                                </time> --}}
                            </span>
                        </a>
                    </div>
                  @endif
                  @foreach($publications as $k => $publication)
                    <div class="col-md-6 publications-item xs-pb-15 sm-pb-30">
                        <a href="{{lPath($publication->node->absolute_path)}}" data-ajax="true" class="ripple">
                            <img src="{{iPath($publication->image, '600px')}}" alt="">
                            <span class="publications-item-detail">
                                <span class="publication-theme">{{$publication->theme}}</span>
                                <h2>{{$publication->name}}</h2>
                                {{-- <time datetime="/* publication datetime */">
                                    {{PH::formatDateTime($publication->pubdate, false, true)}}
                                </time> --}}
                            </span>
                        </a>
                    </div>
                  @endforeach
                  @if(empty($pinned_publications[1]) == false)
                    <div class="col-md-12 publications-item xs-pb-15 sm-pb-30">
                        <a href="{{ lPath($pinned_publications[1]->node->absolute_path) }}" data-ajax="true" class="ripple">
                            <img src="{{iPath($pinned_publications[1]->image, '600px')}}" alt="">
                            <span class="publications-item-detail">
                                <span class="publication-theme">{{$pinned_publications[1]->theme}}</span>
                                <h2>{{$pinned_publications[1]->name}}</h2>
                                {{-- <time datetime="/* publication datetime */">
                                    {{PH::formatDateTime($pinned_publications[1]->pubdate, false, true)}}
                                </time> --}}
                            </span>
                        </a>
                    </div>
                  @endif
                @endif
              </div>

              <div class="form-group">
                  <a href="{{lPath('/publications')}}" data-ajax="true" class="btn btn-block btn-primary btn-outline ripple" data-color="#eee">{{__('Все публикации')}}</a>
              </div>

              @include('banners.down')
          </div>








          <div class="visible-lg col-lg-3 sticky sticky-lg xs-pt-30">

            @include('banners.right')

            @include('partials.poll')

          </div>



      </div>
  </div>
@endsection
