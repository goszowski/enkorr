@extends('layouts.main')
@section('section')
  <div class="xs-pl-0 xs-pr-0 sm-pl-15 sm-pr-15">
      <div class="row">
          <div class="col-lg-9 sticky sticky-sm sticky-lg xs-pt-30">
              <h1 class="h3 xs-mt-0">
                  <b>{{ $fields->name }}</b>
              </h1>
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

              <div class="xs-pt-30">
                <h2 class="column-title">{{ __('Похожие публикации') }}</h2>

                <div class="row publications">
                  @if(count($similar_publications))
                    @foreach ($similar_publications as $publication)
                      @if(isset($publication))
                        <div class="col-md-4 publications-item xs-pb-15 sm-pb-30">
                          <a href="{{lPath($publication->node->absolute_path)}}" data-ajax="true" class="ripple">
                            <img src="{{ asset('imglib/600px/0924852148078415-aykwhqa6lu-1505482244-wl2yx-554.jpg') }}" alt="">
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
            Banner Here
            {{-- @if(count($banners))
              @foreach ($banners as $key => $banner)

              @endforeach
            @endif --}}
          </div>
      </div>
  </div>
@endsection
