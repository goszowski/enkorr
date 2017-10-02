@extends('layouts.main')

@section('top-banner')
  <div class="container-fluid xs-pt-30 xs-pb-30 visible-sm visible-md visible-lg">
    <div class="row">
      @if(isset($banners['up']))
        <div class="col-md-9 col-lg-9 text-right visible-md visible-lg">
            <a href="{{$banners['up']->link}}" target="_blank" rel="nofollow">
                <img src="{{iPath($banners['up']->image, 'full')}}" class="img-responsive" alt="">
            </a>
        </div>
      @endif
    </div>
  </div>
@endsection

@section('section')
  <div class="xs-pl-0 xs-pr-0 sm-pl-15 sm-pr-15">
      <div class="row" id="sticky-wrapper" style="position: relative;">




          <section class="col-sm-6 col-md-4 col-lg-3 sidebar xs-pt-30 sticky sticky-sm sticky-lg">
              <h2 class="column-title">{{__('Новости')}}</h2>
              <ul class="sidebar-list">
                @if(count( $news ))
                  @foreach( $news as $k => $new )
                    <li>
                        <a href="{{ lPath($new->node->absolute_path) }}" data-ajax="true" class="ripple" data-ripple-color="#eee">
                            <span>
                                <time datetime="/* publication datetime */">
                                    {{PH::formatDateTime($new->pubdate, false, true)}}
                                    @if( $new->pinned )
                                      <i class="fa fa-star text-primary xs-ml-5 animated animated-xs bounceIn"></i>
                                    @endif
                                </time>
                                @if( $new->pinned )
                                  {{ $new->name }}
                                @else
                                  <b>{{ $new->name }}</b>
                                @endif
                            </span>
                        </a>
                    </li>
                  @endforeach
                @endif
              </ul>
          </section>







          <div class="col-sm-6 col-md-8 col-lg-6 xs-pt-30 publications sticky sticky-sm sticky-lg">
              <h2 class="column-title visible-xs">{{__('Публикации')}}</h2>
              <div class="row">
                <? $i = 0; ?>
                @if(count($publications) and count($publications) > 4)
                  @foreach($publications as $k => $publication)
                    @if($k% config('public.index.multiplicity') == 0 and count($pinned_publications) and isset($pinned_publications[$i]))
                      <div class="col-md-12 publications-item xs-pb-15 sm-pb-30">
                          <a href="{{ lPath($pinned_publications[$i]->node->absolute_path) }}" data-ajax="true" class="ripple">
                              <img src="{{iPath($pinned_publications[$i]->image, '600px')}}" alt="">
                              <span class="publications-item-detail">
                                  <span class="publication-theme">{{$pinned_publications[$i]->theme}}</span>
                                  <h2>{{$pinned_publications[$i]->name}}</h2>
                                  <time datetime="/* publication datetime */">
                                      {{PH::formatDateTime($pinned_publications[$i]->pubdate, false, true)}}
                                  </time>
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
                                <time datetime="/* publication datetime */">
                                    {{PH::formatDateTime($publication->pubdate, false, true)}}
                                </time>
                            </span>
                        </a>
                    </div>
                  @endforeach

                @elseif(count($publications) and count($publications) <= 4)
                  <div class="col-md-12 publications-item xs-pb-15 sm-pb-30">
                      <a href="{{ lPath($pinned_publications[0]->node->absolute_path) }}" data-ajax="true" class="ripple">
                          <img src="{{iPath($pinned_publications[0]->image, '600px')}}" alt="">
                          <span class="publications-item-detail">
                              <span class="publication-theme">{{$pinned_publications[0]->theme}}</span>
                              <h2>{{$pinned_publications[0]->name}}</h2>
                              <time datetime="/* publication datetime */">
                                  {{PH::formatDateTime($pinned_publications[0]->pubdate, false, true)}}
                              </time>
                          </span>
                      </a>
                  </div>
                  @foreach($publications as $k => $publication)
                    <div class="col-md-6 publications-item xs-pb-15 sm-pb-30">
                        <a href="{{lPath($publication->node->absolute_path)}}" data-ajax="true" class="ripple">
                            <img src="{{iPath($publication->image, '600px')}}" alt="">
                            <span class="publications-item-detail">
                                <span class="publication-theme">{{$publication->theme}}</span>
                                <h2>{{$publication->name}}</h2>
                                <time datetime="/* publication datetime */">
                                    {{PH::formatDateTime($publication->pubdate, false, true)}}
                                </time>
                            </span>
                        </a>
                    </div>
                  @endforeach
                  <div class="col-md-12 publications-item xs-pb-15 sm-pb-30">
                      <a href="{{ lPath($pinned_publications[1]->node->absolute_path) }}" data-ajax="true" class="ripple">
                          <img src="{{iPath($pinned_publications[1]->image, '600px')}}" alt="">
                          <span class="publications-item-detail">
                              <span class="publication-theme">{{$pinned_publications[1]->theme}}</span>
                              <h2>{{$pinned_publications[1]->name}}</h2>
                              <time datetime="/* publication datetime */">
                                  {{PH::formatDateTime($pinned_publications[1]->pubdate, false, true)}}
                              </time>
                          </span>
                      </a>
                  </div>
                @endif
              </div>

              <div class="form-group">
                  <a href="{{lPath('/publications')}}" data-ajax="true" class="btn btn-block btn-primary btn-outline ripple" data-color="#eee">{{__('Все публикации')}}</a>
              </div>

              @if(isset($banners['down']))
                <div class="form-group">
                    <a href="{{$banners['down']->link}}" target="_blank" rel="nofollow">
                        <img src="{{iPath($banners['down']->image, '600px')}}" class="img-responsive" alt="">
                    </a>
                </div>
              @endif
          </div>








          <div class="visible-lg col-lg-3 sticky sticky-lg xs-pt-30">
            @if(isset($banners['right']))
              <div class="form-group">
                  <a href="{{$banners['right']->link}}" target="_blank" rel="nofollow">
                      <img src="{{iPath($banners['right']->image, '600px')}}" class="img-responsive" alt="">
                  </a>
              </div>
            @endif

            @if(isset($quiz))
              <div class="form-group poll xs-pl-10 xs-pr-15 xs-pt-15 xs-pb-15">
                  <h3 class="xs-pb-15">{{$quiz->name}}</h3>
                  {{Form::open(['route' => 'quizAnswer', 'method' => 'post'])}}

                      <input hidden name="quiz" value="{{$quiz->node_id}}">
                      @if(count($answers))
                        @foreach($answers as $k => $option)
                          <div class="checkbox ripple" data-color="#ccc">
                              <input type="radio" name="option" id="variant-{{$k}}" value="{{$option->node_id}}">
                              <label for="variant-{{$k}}">{{$option->name}}</label>
                          </div>
                        @endforeach
                      @endif

                      <button class="btn btn-primary btn-block">Голосовать</button>
                  {{Form::close()}}
              </div>
            @endif
          </div>



      </div>
  </div>
@endsection
