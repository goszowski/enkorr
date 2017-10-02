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
      <div class="row">
          <div class="col-lg-9 sticky sticky-sm sticky-lg xs-pt-30">
              <h1 class="h3 xs-mt-0">
                  <b>{{ $fields->name }}</b>
              </h1>
              <div class="xs-pb-15">
                <time datetime="{{ $fields->pubdate }}">
                  <small class="text-muted">{{PH::formatDateTime($fields->pubdate, false, true)}}</small>
                </time>
              </div>
              <p><b>{{ $fields->title }}</b></p>

              <div class="publication-main-image">
                  <p>
                      <img src="{{ iPath($fields->image, 'full') }}" class="img-responsive" alt="{{ $fields->name }}">
                  </p>
              </div>

              <div class="publication-text">

                {!! $fields->content !!}

              </div>

              <div class="row">
                <div class="col-md-8">
                  {{-- Social sharing --}}
                  {{-- Кнопка лайка ФБ, Кнопка ретвіта ФБ, Кнопка лайка G+, Кнопки поширення: Fb, Tw, G+, In --}}
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam, placeat! Quisquam velit neque doloribus repellendus aliquam, consequatur sunt, modi, ut, culpa ea rerum hic non animi cum itaque totam. Eum.</p>
                </div>
                <div class="col-md-4 text-right">
                  {{-- Filter publications by tag --}}
                  @foreach ($tags as $tag)
                    <a href="{{lPath($tag->node->absolute_path)}}" class="label label-default">{{$tag->name}}</a>
                  @endforeach
                </div>
              </div>

              @if(count($similar_publications))
                <div class="xs-pt-30">
                  <h2 class="column-title">{{ __('Похожие публикации') }}</h2>
                  <div class="row publications">
                      @foreach ($similar_publications as $publication)
                        @if(isset($publication))
                          <div class="col-md-4 publications-item xs-pb-15 sm-pb-30">
                            <a href="{{lPath($publication->node->absolute_path)}}" data-ajax="true" class="ripple">
                              <img src="{{ iPath($publication->image, '600px') }}" alt="">
                              <span class="publications-item-detail">
                                <span class="publication-theme">@if($publication->theme_id) {{$publication->theme}} @endif</span>
                                <h2>{{$publication->name}}</h2>
                                <time datetime="/* publication datetime */">
                                  {{PH::formatDateTime($publication->pubdate, false, true)}}
                                </time>
                              </span>
                            </a>
                          </div>
                        @endif
                      @endforeach
                  </div>
                </div>
              @endif

              @if(isset($banners['down']))
                  <div class="form-group">
                    <a href="{{$banners['down']->link}}" target="_blank" rel="nofollow">
                      <img src="{{iPath($banners['down']->image, 'full')}}" class="img-responsive" alt="">
                    </a>
                  </div>
              @endif

              <div class="xs-pt-30">
                <h2 class="column-title">{{ __('Комментарии') }}</h2>

                @if(empty(Session::get('authUser')))
                  <a role="button" class="btn btn-primary" href="{{lPath('/auth/login')}}">{{__('Авторизируйтесь, что бы оставить комментарий')}}</a>
                @else
                  {{Form::open(['url' => lPath('/comment/store'), 'method' => 'POST'])}}
                  <div class="form-group">
                    <textarea name="text" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary" type="submit">Комментировать</button>
                  </div>
                  <input hidden name="publication_id" value="{{ $fields->node_id }}" />
                  {{Form::close()}}
                @endif

                @foreach( $comments as $comment )
                  <div class="xs-pb-15">
                    <b>{{ $comment->user_name }}</b><br>
                    <small class="text-muted"><i class="fa fa-clock-o"></i> {{PH::formatDateTime($comment->created_at, false, true)}}</small>
                    {{ $comment->content }}
                  </div>
                @endforeach
              </div>
          </div>
          <div class="col-lg-3 sticky sticky-sm sticky-lg xs-pt-30">
            @if(count($banners['right']))
              <div class="form-group">
                <a href="{{$banners['right']->link}}" target="_blank" rel="nofollow">
                  <img src="{{iPath($banners['right']->image, '600px')}}" class="img-responsive" alt="">
                </a>
              </div>
            @endif
            <div class="form-group sidebar">
              <h2 class="column-title">{{__('Публикации')}}</h2>
              <ul class="sidebar-list">
                @foreach ($popular_publications as $publication)
                  <li>
                    <a href="{{lPath($publication->node->absolute_path)}}" data-ajax="true" class="ripple" data-ripple-color="#eee">
                      <span>
                        <time datetime="/* publication datetime */">
                          {{PH::formatDateTime($publication->pubdate, false, true)}}
                        </time>
                        {{$publication->name}}
                      </span>
                    </a>
                  </li>
                @endforeach
              </ul>
            </div>
            <div class="form-group sidebar">
              <h2 class="column-title">{{__('Новости')}}</h2>
              <ul class="sidebar-list">
                @foreach ($latest_news as $new)
                      <li>
                          <a href="{{lPath($new->node->absolute_path)}}" data-ajax="true" class="ripple" data-ripple-color="#eee">
                              <span>
                                  <time datetime="/* publication datetime */">
                                        {{PH::formatDateTime($new->pubdate, false, true)}}
                                      @if($new->pinned) <i class="fa fa-star text-primary xs-ml-5 animated animated-xs bounceIn"></i> @endif
                                  </time>
                                  {{$new->name}}
                              </span>
                          </a>
                      </li>
                    @endforeach
              </ul>
            </div>
      </div>
  </div>
@endsection
