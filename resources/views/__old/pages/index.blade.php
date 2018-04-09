@extends('layouts.main')

@include('partials.seo2')

@section('top-banner')
  @include('banners.up')
@endsection

@section('section')

<div class="container-fluid grey-bg xs-pb-30 xs-pt-20">
  <div class="container">

    <div class="row">

      <div class="home-last-news">
        <div class="col-md-6">
          <a href="{{ lPath($first_news_item->node->absolute_path) }}" class="last-news__big">
            <img src="{{ asset($first_news_item->image_from_gallery) }}" alt="{{ $first_news_item->name }}">
            <div class="last-news__big_description">
              <h2 class="last-news__big_descr_title text-uppercase">{{ $first_news_item->name }}</h2>
              <p class="last-news__big_descr_text">{{ $first_news_item->pub_title }}</p>
            </div>
          </a>
        </div>
        <div class="col-md-6 xs-mt-30 md-pl-10 md-mt-0">
          <div class="block-title">
            <h2 class="block-title_text">{{ __('Последние новости') }}</h2>
          </div>
          <div class="last-news-items-wrapp">
            @foreach($news->slice(1,count($news)) as $news_item)
              <a href="{{ lPath($news_item->node->absolute_path) }}" class="last-news_item">
                <p class="last-news_item_text">{{ $news_item->name }}</p>
                <span class="last-news-item_time">
                  <time datetime="{{ $news_item->pubdate }}">
                    @if($news_item->pubdate->format('Y-m-d') == Carbon::now()->format('Y-m-d'))
                      {{ $news_item->pubdate->format('H:i') }}
                    @else
                      {{ $news_item->pubdate->format('d.m.Y, H:i') }}
                    @endif
                  </time>
                </span>
              </a>
            @endforeach
          </div>
          <div class="last-news-btn-wrapp text-center xs-mt-30 sm-mt-40">
            <a href="{{ lPath('/news') }}" class="btn btn-warning big-btn text-uppercase">{{ __('Перейти в раздел') }}</a>
          </div>
        </div>
      </div>

    </div>
    <div class="baner-wrapp text-center xs-mt-30 xs-mb-15">
      <img src="{{ asset('/asset/img/banner.png') }}" alt="news1">
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-4">
      
      <div class="equal-block">
        <div class="block-title">
          <h2 class="block-title_text">{{ __('Главные новости') }}</h2>
        </div>
        <div class="equal-block_content">
          @foreach($main_news as $main_news_item)
            <a href="{{ lPath($main_news_item->node->absolute_path) }}" class="main-news_item">
              <p class="main-news_item__text">{{ $main_news_item->name }}</p>
            </a>
          @endforeach
        </div>
      </div>

      <div class="btn-wrapp text-center xs-mt-20">
        <a href="{{ lPath('/news') }}" class="btn btn-default big-btn black-border text-uppercase bold">{{ __('Перейти в раздел') }}</a>
      </div>

    </div>
    <div class="col-md-4">
      <div class="equal-block">
        <div class="block-title">
          <h2 class="block-title_text has-rs-icon">{{ __('Публикации') }}</h2>
        </div>

        <div class="equal-block_content">
          @foreach($publications as $k=>$publication)
            <a href="{{ lPath($publication->node->absolute_path) }}" class="publication-item">
              @if(! $k)
                <img src="{{ asset($publication->image_from_gallery) }}">
              @endif
              <p class="publication-item_text">{{ $publication->name }}</p>
            </a>
          @endforeach
        </div>
      </div>
      <div class="btn-wrapp text-center xs-mt-20">
        <a href="{{ lPath('/publications') }}" class="btn btn-default big-btn black-border text-uppercase bold">{{ __('Перейти в раздел') }}</a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="equal-block bg-warning xs-mt-20 md-mt-0 xs-pl-10 xs-pr-10">
        <div class="block-title white-title">
          <h2 class="block-title_text">Интервью</h2>
        </div>
        <div class="equal-block_content">
          <div class="owl-carousel owl-carousel-home">
            @foreach($interviews as $interview)
              <a href="#" class="home-carousel_item">
                <div class="home-carousel_item__img">
                  <img src="{{ asset($interview->image_from_gallery) }}">
                </div>
                <div class="home-carousel_item__descr">
                  <p class="xs-mt-5">Игорь Щуцкий</p>
                  <p>«Карпатнефтехим» через полтора месяца выйдет на 98% мощности</p>
                </div>
              </a>
            @endforeach
          </div>

          <div class="cust-nav hidden-xs visible-md visible-lg">
            <div class="nav-wrapp">
              <button href="#" class="customPrevBtn"><i class="fa fa-caret-left" aria-hidden="true"></i></button>
              <button href="#" class="customNextBtn"><i class="fa fa-caret-right" aria-hidden="true"></i></button>
            </div>
          </div>
          
        </div>
        <div class="text-right xs-pb-10 small-logo">
          <img src="{{ asset('/asset/img/small-logo.png') }}">
        </div>
      </div>
      <div class="btn-wrapp text-center xs-mt-20">
        <a href="#" class="btn btn-default big-btn black-border text-uppercase bold">Перейти в раздел</a>
      </div>
    </div>
  </div>
  <div class="baner-wrapp text-center xs-mt-30 xs-mb-15 sm-mb-30">
    <img src="{{ asset('/asset/img/banner.png') }}" alt="news1">
  </div>
</div>

<div class="container-fluid black-bg xs-pt-25 xs-pb-30">
  <div class="container">
    <div class="block-title white-text">
      <h2 class="block-title_text">Колонки</h2>
    </div>
    <div class="row sm-mt-30 xs-pb-15">
      <div class="col-md-4">
        <div class="column-item xs-mt-40 md-mt-20 xs-mb-10">
          <a href="#" class="column-item_author">
            <div class="row">
              <div class="col-md-4">
                <div class="column-item_author__img">
                  <img src="{{ asset('/asset/img/1.png') }}" alt="q">
                </div>
              </div>
              <div class="col-md-8">
                <p class="column-item_author__name">Артем Куюн</p>
                <p class="column-item_author__work">Консталтинговая група А-95</p>
              </div>
            </div>
          </a>
          <p class="column-item_date xs-mt-20">8 августа, 17:30</p>
          <a href="#" class="column-item_text">
            <h3 class="column-item_text__title">Новый нокаут от Кличко</h3>
            <p class="column-item_text__descr xs-mt-25">
              – Большие и не очень, газовые и дизельные, ржавые и белые с красной полосой — буквально заполонившие столицу “бочки” имели одну общую особенность: все они были нелегальными <span class="load">...</span>
            </p>
          </a>
        </div>
      </div>

      <div class="col-md-4">
        <div class="column-item xs-mt-40 md-mt-20 xs-mb-10">
          <a href="#" class="column-item_author">
            <div class="row">
              <div class="col-md-4">
                <div class="column-item_author__img">
                  <img src="{{ asset('/asset/img/2.png') }}" alt="q">
                </div>
              </div>
              <div class="col-md-8">
                <p class="column-item_author__name">Артем Куюн</p>
                <p class="column-item_author__work">Консталтинговая група А-95</p>
              </div>
            </div>
          </a>
          <p class="column-item_date xs-mt-20">8 августа, 17:30</p>
          <a href="#" class="column-item_text">
            <h3 class="column-item_text__title">Мы горды тем, что смогли помочь городу, в котором родились</h3>
            <p class="column-item_text__descr xs-mt-25">
              – Наша компания была активным участником программы по очистке Киева от нелегальных газовых заправок. Мы горды тем, что смогли помочь городу, в котором родились, живем, работаем и который любим <span class="load">...</span>
            </p>
          </a>
        </div>
      </div>

      <div class="col-md-4">
        <div class="column-item xs-mt-40 md-mt-20 xs-mb-10">
          <a href="#" class="column-item_author">
            <div class="row">
              <div class="col-md-4">
                <div class="column-item_author__img">
                  <img src="{{ asset('/asset/img/1.png') }}" alt="q">
                </div>
              </div>
              <div class="col-md-8">
                <p class="column-item_author__name">Артем Куюн</p>
                <p class="column-item_author__work">Консталтинговая група А-95</p>
              </div>
            </div>
          </a>
          <p class="column-item_date xs-mt-20">8 августа, 17:30</p>
          <a href="#" class="column-item_text">
            <h3 class="column-item_text__title">Новый нокаут от Кличко</h3>
            <p class="column-item_text__descr xs-mt-25">
              – Большие и не очень, газовые и дизельные, ржавые и белые с красной полосой — буквально заполонившие столицу “бочки” имели одну общую особенность: все они были нелегальными <span class="load">...</span>
            </p>
          </a>
        </div>
      </div>
    </div>
    <div class="btn-wrapp text-center xs-mt-20">
      <a href="#" class="btn btn-default big-btn white-border text-uppercase bold">Перейти в раздел</a>
    </div>
    <div class="baner-wrapp text-center xs-mt-30 xs-mb-15">
      <img src="{{ asset('/asset/img/banner.png') }}" alt="news1">
    </div>
  </div>
</div>

<div class="container xs-pt-20 xs-pb-40">
  <div class="block-title">
    <h2 class="block-title_text">Аналитика</h2>
  </div>
  <div class="row analitic-content xs-mt-30">
    <div class="col-md-4">
      <p class="analitic-content_title">Цены в Европе (вчера)</p>
      <table class="table xs-mt-35">
        <tbody>
          <tr>
            <td class="price-title">RBOB Gasoline (NYMEX), $/Gall</td>
            <td class="text-left price-value fix-width">1.6212 <i class="fa fa-caret-down text-danger"></i></td>
          </tr>
          <tr>
            <td class="price-title">RBOB Gasoline (NYMEX), $/Gall</td>
            <td class="text-left  price-value fix-width">1.62 <i class="fa fa-caret-up text-success"></i></td>
          </tr>
          <tr>
            <td class="price-title">RBOB Gasoline (NYMEX), $/Gall</td>
            <td class="text-left  price-value fix-width">1.62 <i class="fa fa-caret-up text-success"></i></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col-md-4">
      <p class="analitic-content_title">Цены в Украине (вчера)</p>
      <table class="table">
        <thead>
          <tr>
            <th></th>
            <th class="field-name">Опт, грн/т</th>
            <th class="field-name">Розница, грн/л</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="price-title">А-95</td>
            <td class="price-value fa-style">285752<i class="fa fa-caret-up text-success"></i></td>
            <td class="text-left price-value fa-style">1.6212 <i class="fa fa-caret-down text-danger"></i></td>
          </tr>
          <tr>
            <td class="price-title">А-95</td>
            <td class="price-value fa-style">285752</td>
            <td class="text-left price-value fa-style">1.6212 <i class="fa fa-caret-down text-danger"></i></td>
          </tr>
          <tr>
            <td class="price-title">А-95</td>
            <td class="price-value fa-style">285752</td>
            <td class="text-left price-value fa-style">1.6212 <i class="fa fa-caret-down text-danger"></i></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col-md-4">
      16.25
    </div>
  </div>
  <div class="baner-wrapp text-center xs-mt-30 xs-mb-15">
    <img src="{{ asset('/asset/img/banner.png') }}" alt="news1">
  </div>
</div>


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
                            <img src="{{ asset($new->image_from_gallery) }}" alt="">
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
                                <img src="{{asset($homePub->publication->image_from_gallery)}}" alt="">
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

            @include('partials.indicators.prices_eu')
            @include('partials.indicators.prices_ua')

          </div>



      </div>
  </div>
@endsection
