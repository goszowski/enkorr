@extends('layouts.main')
@section('section')
<div class="sm-pl-15 sm-pr-15">
    <div class="row all-publications">
        <section class="col-md-9 sidebar xs-pt-30 sticky sticky-sm sticky-lg">
            <h2 class="column-title">{{trans('Публикации')}}</h2>
            <ul class="sidebar-list">
              @if(count( $publications ))
                @foreach( $publications as $k => $publication )
                  <li>
                      <a href="#" data-ajax="true" class="ripple" data-ripple-color="#eee">
                          <img src="{{iPath($publication->image,'600px')}}" alt="">
                          <span>
                              <time datetime="/* publication datetime */">
                                  {{PH::formatDateTime($publication->created_at, false, true)}}
                              </time>
                              <b>{{ $publication->name }}</b>
                          </span>
                      </a>
                  </li>
                @endforeach
              @endif
            </ul>
            <h2 class="column-title">{{trans('Новости')}}</h2>
            <ul class="sidebar-list">
              @if(count( $news ))
                @foreach( $news as $k => $new )
                  <li>
                      <a href="#" data-ajax="true" class="ripple" data-ripple-color="#eee">
                          <img src="{{iPath($new->image,'600px')}}" alt="">
                          <span>
                              <time datetime="/* publication datetime */">
                                  {{PH::formatDateTime($new->created_at, false, true)}}
                              </time>
                              <b>{{ $new->name }}</b>
                          </span>
                      </a>
                  </li>
                @endforeach
              @endif
            </ul>
        </section>

        <div class="col-lg-3 sticky sticky-sm sticky-lg xs-pt-30">
            <div class="form-group">
                <a href="https://runsite.com.ua" target="_blank" rel="nofollow">
                    <img src="/assets/images/demo/banner.jpg" class="img-responsive" alt="">
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
