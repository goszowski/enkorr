@extends('layouts.main')

@include('partials.seo2')

@section('section')
<div class="sm-pl-15 sm-pr-15">
    <div class="row all-publications">
        <section class="col-md-9 sidebar xs-pt-30 sticky sticky-sm sticky-lg">
            <h2 class="column-title">{{__('Результаты поиска')}}</h2>
            @if(count( $publications ))
              <ul class="sidebar-list">
                  @foreach( $publications as $k => $publication )
                    <li>
                        <a href="{{lPath($publication->node->absolute_path)}}" data-ajax="true" class="ripple" data-ripple-color="#eee">
                            <img src="{{iPath($publication->image,'600px')}}" alt="">
                            <span>
                                <time datetime="/* publication datetime */">
                                    {{PH::formatDateTime($publication->pubdate, false, true)}}
                                </time>
                                <b>{{ $publication->name }}</b>
                            </span>
                        </a>
                    </li>
                  @endforeach
              </ul>
            @else
              {{__('Публикаций по данному запросу не найдено')}}
            @endif
        </section>

        {{-- <div class="col-lg-3 sticky sticky-sm sticky-lg xs-pt-30">
            <div class="form-group">
                <a href="https://runsite.com.ua" target="_blank" rel="nofollow">
                    <img src="/assets/images/demo/banner.jpg" class="img-responsive" alt="">
                </a>
            </div>
        </div> --}}
    </div>
</div>
@endsection
