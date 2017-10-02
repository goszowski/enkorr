@extends('layouts.main')

@include('partials.seo2')

@section('top-banner')
  @include('banners.up')
@endsection

@section('section')
  @include('partials.title')
  <div class="xs-pl-0 xs-pr-0 sm-pl-15 sm-pr-15">
      <div class="row">
          <div class="col-md-9 sticky sticky-sm sticky-lg xs-pt-30">
              <h1 class="h3 xs-mt-0">
                  <b>{{ $fields->name }}</b>
              </h1>
              <div class="row xs-pb-20">
                <div class="col-xs-4">
                    <time datetime="{{ $fields->pubdate }}">
                      <small class="text-muted">{{PH::formatDateTime($fields->pubdate, false, true)}}</small>
                    </time>
                </div>
                <div class="col-xs-8 text-right">
                  @if(count($authors))
                    <small class="text-muted">
                      @if(count($authors) > 1)
                        {{ __('Авторы') }}:
                      @else
                        {{ __('Автор') }}:
                      @endif

                      @foreach ($authors as $k=>$author)
                        <a href="{{lPath($author->node->absolute_path)}}">{{$author->name}}</a>{{ (++$k < count($authors)) ? ',' : null }}
                      @endforeach
                    </small>
                  @endif
                </div>
              </div>
              <p><b>{{ $fields->pub_title }}</b></p>

              <div class="publication-main-image publication-text">
                  <p>
                      <img src="{{ iPath($fields->image, 'full') }}" class="img-responsive" alt="{{ $fields->name }}" title="{{ $fields->photo_text }}">
                  </p>
              </div>

              <div class="publication-text">

                @if(count($texts))
                  @foreach ($texts as $key => $text)
                    {!! $text->content !!}
                    @include('partials.publication_gallery')
                  @endforeach
                @endif



              </div>

              <div class="row">
                <div class="col-md-8">
                  {{-- Social sharing --}}
                  <div id="shareIconsCount" data-url="{{ lPath($node->absolute_path) }}" data-title="{{ $fields->name }}"></div>

                </div>
                <div class="col-md-4 text-right">
                  {{-- Filter publications by tag --}}
                  @foreach ($tags as $tag)
                    <a href="{{lPath($tag->node->absolute_path)}}" class="label label-default">{{$tag->name}}</a>
                  @endforeach
                </div>
              </div>


              @if(count($similar_publications) or count($similar_publications_auto))
                <div class="xs-pt-30">
                  <h2 class="column-title">{{ __('Похожие публикации') }}</h2>
                  <div class="row publications">
                    @if(count($similar_publications))
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
                    @endif
                    @if(count($similar_publications_auto))
                      @foreach ($similar_publications_auto as $publication)
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
                    @endif
                  </div>
                </div>
              @endif

              @include('banners.down')


              <div class="xs-pt-30">
                <h2 class="column-title">{{ __('Комментарии') }}</h2>

                @if(empty(Session::get('authUser')))
                  <p>{{__('Авторизируйтесь, что бы оставить комментарий')}}</p>
                  <a role="button" class="btn btn-primary" href="{{lPath('/auth/login')}}">{{ __('Авторизация') }}</a>
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
          <div class="col-md-3 hidden-xs hidden-sm sticky sticky-lg xs-pt-30">

            @include('banners.right')

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
</div>
@endsection
