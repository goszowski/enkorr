@extends('layouts.main')
@section('section')
<div class="sm-pl-15 sm-pr-15">
    <div class="row all-publications">
        <section class="col-md-9 sidebar xs-pt-30 sticky sticky-sm sticky-lg">
            <h2 class="column-title">{{$fields->name}}</h2>
            <ul class="sidebar-list">
              @if(count( $publications ))
                @foreach( $publications as $k => $publication )
                  <li>
                    @if($publication->theme_id == config('public.theme.news'))
                      <a href="{{ lPath($publication->node->absolute_path) }}" data-ajax="true" class="ripple" data-ripple-color="#eee">
                          <img src="{{iPath($publication->image,'600px')}}" alt="">
                          <span>
                              <time datetime="/* publication datetime */">
                                  {{PH::formatDateTime($publication->pubdate, false, true)}}
                                  @if( $publication->pinned )
                                    <i class="fa fa-star text-primary xs-ml-5 animated animated-xs bounceIn"></i>
                                  @endif
                              </time>
                              @if( $publication->pinned )
                                {{ $publication->name }}
                              @else
                                <b>{{ $publication->name }}</b>
                              @endif
                          </span>
                      </a>
                    @else
                      <a href="{{ lPath($publication->node->absolute_path) }}" data-ajax="true" class="ripple" data-ripple-color="#eee">
                        <img src="{{iPath($publication->image,'600px')}}" alt="">
                        <span>
                          <time datetime="/* publication datetime */">
                            {{PH::formatDateTime($publication->pubdate, false, true)}}
                          </time>
                          <b>{{ $publication->name }}</b>
                        </span>
                      </a>
                    @endif
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
