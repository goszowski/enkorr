@extends('layouts.main')
@section('section')
  <div class="xs-pl-0 xs-pr-0 sm-pl-15 sm-pr-15">
      <div class="row">
          <div class="col-lg-9 sticky sticky-sm sticky-lg xs-pt-30">
              <h1 class="h3 xs-mt-0">
                  <b>{{ $fields->name }}</b>
              </h1>
              <p><b>{{ $fields->title }}</b></p>

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
                  <a href="#" class="label label-default">Tag 1</a>
                  <a href="#" class="label label-default">Tag 2</a>
                  <a href="#" class="label label-default">Tag 3</a>
                </div>
              </div>

              <div class="xs-pt-30">
                <h2 class="column-title">{{ __('Похожие публикации') }}</h2>

                <div class="row publications">
                  <div class="col-md-4 publications-item xs-pb-15 sm-pb-30">
                      <a href="#" data-ajax="true" class="ripple">
                          <img src="{{ asset('imglib/600px/0924852148078415-aykwhqa6lu-1505482244-wl2yx-554.jpg') }}" alt="">
                          <span class="publications-item-detail">
                              <span class="publication-theme">вфівфівіф</span>
                              <h2>чсчясчясячс</h2>
                              <time datetime="/* publication datetime */">
                                  ууцйу
                              </time>
                          </span>
                      </a>
                  </div>

                  <div class="col-md-4 publications-item xs-pb-15 sm-pb-30">
                      <a href="#" data-ajax="true" class="ripple">
                          <img src="{{ asset('imglib/600px/0924852148078415-aykwhqa6lu-1505482244-wl2yx-554.jpg') }}" alt="">
                          <span class="publications-item-detail">
                              <span class="publication-theme">вфівфівіф</span>
                              <h2>чсчясчясячс</h2>
                              <time datetime="/* publication datetime */">
                                  ууцйу
                              </time>
                          </span>
                      </a>
                  </div>

                  <div class="col-md-4 publications-item xs-pb-15 sm-pb-30">
                      <a href="#" data-ajax="true" class="ripple">
                          <img src="{{ asset('imglib/600px/0924852148078415-aykwhqa6lu-1505482244-wl2yx-554.jpg') }}" alt="">
                          <span class="publications-item-detail">
                              <span class="publication-theme">вфівфівіф</span>
                              <h2>чсчясчясячс</h2>
                              <time datetime="/* publication datetime */">
                                  ууцйу
                              </time>
                          </span>
                      </a>
                  </div>
                </div>
              </div>

              <div class="xs-pt-30">
                <h2 class="column-title">{{ __('Комментарии') }}</h2>

                <div class="form-group">
                  <textarea name="" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary" type="submit">Комментировать</button>
                </div>

                @for($i=0; $i<10; $i++)
                  <div class="xs-pb-15">
                    <b>User name</b><br>
                    <small class="text-muted"><i class="fa fa-clock-o"></i> pubdate</small>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit deleniti facilis, incidunt natus aspernatur quo eveniet quas praesentium eius enim veniam dicta et culpa consequatur vero impedit, error illum nesciunt.</p>
                  </div>
                @endfor
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
