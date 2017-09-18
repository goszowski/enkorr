@extends('layouts.main')
@section('section')
  <div class="xs-pl-0 xs-pr-0 sm-pl-15 sm-pr-15">
      <div class="row" id="sticky-wrapper" style="position: relative;">




          <section class="col-sm-6 col-md-4 col-lg-3 sidebar xs-pt-30 sticky sticky-sm sticky-lg">
              <h2 class="column-title">{{trans('Новости')}}</h2>
              <ul class="sidebar-list">
                @if(count( $news ))
                  @foreach( $news as $k => $new )
                    <li>
                        <a href="#" data-ajax="true" class="ripple" data-ripple-color="#eee">
                            <span>
                                <time datetime="/* publication datetime */">
                                    {{PH::formatDateTime($new->created_at, false, true)}}
                                    @if( $new->special )
                                      <i class="fa fa-star text-primary xs-ml-5 animated animated-xs bounceIn"></i>
                                    @endif
                                </time>
                                @if( $new->special )
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
              <h2 class="column-title visible-xs">{{trans('Публикации')}}</h2>
              <div class="row">
                <? $i = 0; ?>
                @if(count($publications))
                  @foreach($publications as $k => $publication)
                    @if($k% config('public.index.multiplicity') == 0 && count($pinned_publications) && isset($pinned_publications[$i]))
                      <div class="col-md-12 publications-item xs-pb-15 sm-pb-30">
                          <a href="#" data-ajax="true" class="ripple">
                              <img src="{{iPath($pinned_publications[$i]->image, '600px')}}" alt="">
                              <span class="publications-item-detail">
                                  <span class="publication-theme">{{$pinned_publications[$i]->theme_id}}</span>
                                  <h2>{{$pinned_publications[$i]->name}}</h2>
                                  <time datetime="/* publication datetime */">
                                      {{PH::formatDateTime($pinned_publications[$i]->created_at, false, true)}}
                                  </time>
                              </span>
                          </a>
                      </div>
                      <? $i++; ?>
                    @endif
                    <div class="col-md-6 publications-item xs-pb-15 sm-pb-30">
                        <a href="#" data-ajax="true" class="ripple">
                            <img src="{{iPath($publication->image, '600px')}}" alt="">
                            <span class="publications-item-detail">
                                <span class="publication-theme">{{$publication->theme_id}}</span>
                                <h2>{{$publication->name}}</h2>
                                <time datetime="/* publication datetime */">
                                    {{PH::formatDateTime($publication->created_at, false, true)}}
                                </time>
                            </span>
                        </a>
                    </div>
                  @endforeach
                @endif
              </div>

              <div class="form-group">
                  <a href="{{lPath('/publications')}}" data-ajax="true" class="btn btn-block btn-primary btn-outline ripple" data-color="#eee">Все публикации</a>
              </div>
          </div>








          <div class="visible-lg col-lg-3 sticky sticky-lg xs-pt-30">
              <div class="form-group">
                  <a href="https://runsite.com.ua" target="_blank" rel="nofollow">
                      <img src="/assets/images/demo/banner.jpg" class="img-responsive" alt="">
                  </a>
              </div>

              <div class="form-group poll xs-pl-10 xs-pr-15 xs-pt-15 xs-pb-15">
                  <h3 class="xs-pb-15">Как вы оцениваете действия Вецкаганса?</h3>
                  <form action="">
                      <div class="checkbox ripple" data-color="#ccc">
                          <input type="radio" name="name" id="variant-1" value="1">
                          <label for="variant-1">на 5</label>
                      </div>

                      <div class="checkbox ripple" data-color="#ccc">
                          <input type="radio" name="name" id="variant-2" value="2">
                          <label for="variant-2">ненавижу его</label>
                      </div>

                      <div class="checkbox ripple" data-color="#ccc">
                          <input type="radio" name="name" id="variant-3" value="3">
                          <label for="variant-3">нормально</label>
                      </div>


                      <button class="btn btn-primary btn-block">Голосовать</button>
                  </form>
              </div>

              <div class="form-group">
                  <a href="https://runsite.com.ua" target="_blank" rel="nofollow">
                      <img src="/assets/images/demo/banner.jpg" class="img-responsive" alt="">
                  </a>
              </div>
          </div>



      </div>
  </div>
@endsection
