@if(!Input::get('ajax'))<!DOCTYPE html>
  <html lang="ru">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

      <title>@yield('title')</title>
      <meta property="og:title" content="@yield('title')">
      <meta property="og:type" content="website">
      <meta property="og:url" content="{{ lPath($node->absolute_path) }}">
      <meta property="og:image" content="@yield('image')">
      <meta name="description" content="@yield('description')">

      <link rel="manifest" href="{{ url('manifest.json') }}">
      <link rel="shortcut icon" href="{{asset('/favicon.ico')}}" type="image/x-icon">
      <link rel="icon" href="{{asset('/favicon.ico')}}" type="image/x-icon">

      <link href="https://fonts.googleapis.com/css?family=Merriweather:400,700|Open+Sans:400,700&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

      <!-- Vendor styles -->
      <link rel="stylesheet" href="{{asset('asset/css/bootstrap/stylesheets/bootstrap.css')}}">
      <link rel="stylesheet" href="{{asset('asset/vendor/sass-space/sass-space.css')}}">
      <link rel="stylesheet" href="{{asset('asset/vendor/ripple/ripple.css')}}">
      <link rel="stylesheet" href="{{asset('asset/vendor/jssocials-1.4.0/jssocials-theme-minima.css')}}">
      <link rel="stylesheet" href="{{asset('asset/vendor/jssocials-1.4.0/jssocials.css')}}">
      <link rel="stylesheet" href="{{asset('asset/vendor/owl-carousel/owl.carousel.min.css')}}">
      <link rel="stylesheet" href="{{asset('asset/vendor/owl-carousel/owl.theme.default.min.css')}}">
      <!-- / Vendor styles -->

      <script src="{{ asset('asset/vendor/jquery/jquery-3.2.1/jquery.min.js') }}"></script>
      <script src="{{ asset('asset/vendor/chart-js/chart.min.js') }}"></script>

      <!-- App styles -->
      <link rel="stylesheet" href="{{asset('asset/css/style.css?5')}}">
      <!-- / App styles -->
    </head>
    <body>

      <div class="brand-wall">
        @if(isset($main_banner))
          {{-- TODO: position: fixed якшо банер закріплений --}}
          <div class="visible-lg" style="position: fixed; background-image: url({{iPath($main_banner->image, 'full')}}); background-color: @if(isset($main_banner->color)) {{$main_banner->color}} @else #000 @endif;"></div>
        @endif
      </div>





      <div class="container website-container xs-pl-0 xs-pr-0 sm-pl-15 sm-pr-15">
        <a href="https://runsite.com.ua" target="_blank" class="author" data-toggle="tooltip" title="Рансайт: Разработка и поддержка сайтов 2016-2017">Разработка и поддержка сайта: Рансайт ТОВ</a>
        @yield('top-banner')

        <div class="xs-pl-15 xs-pr-15 sm-pl-0 sm-pr-0">
          <div class="row main-nav-container sticky-all">
            <nav class="navbar navbar-inverse xs-mb-0">
              <div class="navbar-header">
                <a class="navbar-brand ripple xs-pl-10 sm-pl-20" href="{{ lPath('/') }}" data-ajax="true">
                    <img src="{{asset('/imglib/touch/48x48.png')}}" alt="enkorr"> <b>enkorr</b>
                </a>
                <button type="button" class="navbar-toggle collapsed ripple xs-mr-10" id="main-nav-toggle" data-toggle="collapse" data-target="#main-nav" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div>

              <div class="collapse navbar-collapse" id="main-nav">
                <ul class="nav navbar-nav text-uppercase">
                  @if(count( $sections ))
                    @foreach( $sections as $section)
                      <li><a href="{{lPath($section->link)}}" data-ajax="true" class="ripple"><span class="">{{$section->name}}</span></a></li>
                    @endforeach
                  @endif
                </ul>



                <ul class="nav navbar-nav navbar-right text-uppercase">
                  @if(empty(Session::get('authUser')))
                    <li><a href="{{lPath('/auth/login')}}" data-ajax="true" class="ripple"><i class="fa fa-sign-in"></i> <span class="visible-xs-inline visible-md-inline visible-lg-inline">{{__('Вход')}}</span></a></li>
                    <li><a href="{{lPath('/auth/register')}}" data-ajax="true" class="ripple"><i class="fa fa-user-plus"></i> <span class="visible-xs-inline visible-lg-inline sm-pr-15">{{__('Регистрация')}}</span></a></li>
                  @else
                    <li><a href="{{lPath(Session::get('authUser')->node->absolute_path)}}" data-ajax="true" class="ripple"><i class="fa fa-user"></i> <span class="visible-xs-inline visible-md-inline visible-lg-inline">{{__('Аккаунт')}}</span></a></li>
                    <li><a href="{{lPath('/auth/logout')}}" class="ripple"><i class="fa fa-sign-out" aria-hidden="true"></i> <span class="visible-xs-inline visible-lg-inline sm-pr-15">{{__('Выход')}}</span></a></li>
                  @endif
                </ul>

                {{Form::open(['url' => lPath('/search'), 'class' => 'navbar-form navbar-left  custom-search', 'method' => 'GET'])}}
                <div class="">
                  <div class="form-group has-feedback">
                    <input name="search" type="text" class="form-control sm-pl-20" placeholder="{{__('Поиск')}}">
                    <button type="submit" class="fa fa-search form-control-feedback sm-pr-30" aria-hidden="true"></button>
                  </div>
                </div>
                {{Form::close()}}


              </div>
            </nav>
          </div>


          <div class="loader active">
            <div class="lds-css ng-scope">
              <div style="width:100%;height:100%" class="lds-eclipse">
                <div></div>
              </div>
            </div>
          </div>

          <div class="scroll-top-container">
            <div class="scroll-top text-uppercase"><i class="fa fa-arrow-circle-up"></i> <span>{{__('Вверх')}}</span></div>
          </div>

          <div id="app">
            @endif
            @yield('section')
            @if(!Input::get('ajax'))
          </div>

          <div class="row footer xs-mt-30">
            <div class="xs-p-25 xs-pb-40">
              <div class="row">
                <div class="col-md-4 hidden-xs hidden-sm">
                  <img src="{{ asset('assets/images/logo-white.png') }}" alt="Enkorr">
                </div>
                <div class="col-md-4 text-center footer-nav xs-pt-25 text-uppercase">
                  <a href="{{ lPath('/o-proekte') }}" data-ajax="true" class="xs-mr-20">{{ __('О проекте') }}</a>
                  <a href="{{ lPath('/contacts') }}" data-ajax="true" class="xs-ml-20">{{ __('Контакты') }}</a>
                </div>
                <div class="col-md-4 xs-pt-25 text-right">
                  <ul class="footer-social">
                    <li>
                      <a href="" rel="nofollow" target="_blank">
                        <i class="fa fa-facebook"></i>
                      </a>
                    </li>
                    <li>
                      <a href="" rel="nofollow" target="_blank">
                        <i class="fa fa-twitter"></i>
                      </a>
                    </li>
                    <li>
                      <a href="" rel="nofollow" target="_blank">
                        <i class="fa fa-google-plus"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

        </div>
        </div>
      <!-- Vendor scripts -->
      <script src="{{ asset('asset/vendor/goszowski/ajax-navigation-1.0.0/ajax-navigation.js') }}"></script>
      <script src="{{ asset('asset/vendor/twbs/bootstrap-3.3.7-dist/js/bootstrap.js') }}"></script>
      <script src="{{ asset('asset/vendor/sticky-kit/jquery.sticky-kit.min.js') }}"></script>
      <script src="{{ asset('asset/vendor/jssocials-1.4.0/jssocials.min.js') }}"></script>
      <script src="{{ asset('asset/vendor/owl-carousel/owl.carousel.min.js') }}"></script>
      <!-- / Vendor scripts -->

      <!-- App scripts -->
      <script src="{{ asset('assets/js/scripts.js?4') }}"></script>
      <script type="text/javascript">
        $(function() {

          appBuild();
          // Ajax navigation
          var navigation = new AjaxNavigation;
          navigation.onPageLoad(function() {
            // Calling after page load
            appBuild();
          });


          $(document).on('click', '.image-with-title', function() {
            $(this).toggleClass('hidden-caption');
          });

          $(document).on('click', '#main-nav ul li a, .navbar-brand', function() {
            if(! $('#main-nav-toggle').hasClass('collapsed'))
            {
              $('#main-nav-toggle').click();
            }
          });




          var lastScrollTop = 0;
          $(window).scroll(function(event){
             var st = $(this).scrollTop();
             if (st > lastScrollTop){
                $('.scroll-top').removeClass('active');
             } else {
                if($(window).scrollTop() >= 150)
                {
                  $('.scroll-top').addClass('active');
                }
                else
                {
                  $('.scroll-top').removeClass('active');
                }
             }
             lastScrollTop = st;
          });


          $('.scroll-top').on('click', function() {
            $('html, body').scrollTop(0);
            $(this).removeClass('active');
          });




          /* Ripple efect */
          $(document).on('click', '.ripple', function (e) {
            //e.preventDefault();
            var $div = $('<div/>'),
              btnOffset = $(this).offset(),
              xPos = e.pageX - btnOffset.left,
              yPos = e.pageY - btnOffset.top;
            $div.addClass('ripple-effect');
            var $ripple = $('.ripple-effect');
            $ripple.css('height', $(this).height());
            $ripple.css('width', $(this).height());
            $div.css({
              top: yPos - $ripple.height() / 2,
              left: xPos - $ripple.width() / 2,
              background: $(this).data('ripple-color')
            }).appendTo($(this));
            window.setTimeout(function () {
              $div.remove();
            }, 1000);
          });



        });
      </script>
      <!-- / App scripts  -->

      @yield('js')
    </body>
  </html>
@endif
