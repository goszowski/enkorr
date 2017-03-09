@if(!Input::get('ajax'))<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- PWA SECTION --}}
    <link rel="manifest" href="/manifest.json">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="AppName">
    <link rel="apple-touch-icon" href="{{asset('icons/_app_store_5122x.png')}}">
    <meta name="msapplication-TileImage" content="{{asset('icons/_app_store_5122x.png')}}">
    <meta name="msapplication-TileColor" content="#2F3BA2">


    <title>@yield('title')</title>
    <!--[if IE]>
     <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    {{-- <meta name="keywords" content="@yield('keywords')"> --}}
    <meta name="description" content="@yield('description')">

    {{-- Open Graph Sections --}}
    <meta property="og:type"  content="website" />
    <meta property="og:title"  content="@yield('og:title')" />
    <meta property="og:image"  content="@yield('og:image')" />
    {{-- [END] Open Graph Sections --}}

    {{-- Styles --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />

    <link rel="stylesheet" href="{{asset('asset/css/pace.css')}}">
    <link rel="stylesheet" href="{{asset('asset/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('asset/css/sass-space.css')}}">
    {{-- [END] Styles --}}
  </head>
  <body @if(config('runsite.ajax.enabled') and config('runsite.ajax.cache')) data-ajax-cache="true" @endif>
    <nav class="navbar navbar-default main-navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navigation" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" data-ajax="true" href="{{lPath('/')}}">RUNSITE PWA</a>
        </div>

        <div class="collapse navbar-collapse" id="main-navigation">

          {{-- Main navigation --}}
          {!! Menu::generate(4, 'main') !!}

          {{-- Social networks --}}
          {!! Menu::generate(5, 'social') !!}

        </div>
      </div>
    </nav>


    {{-- WEB APP CONTENT --}}
    <div id="app-content">
      @endif

        @yield('content')

      @if(!Input::get('ajax'))
    </div>
    {{-- [END] WEB APP CONTENT --}}


    <footer class="xs-pt-30 xs-pb-30">
      <div class="container">

        <div class="xs-p-15 text-center">
          {{__('Розробка та підтримка сайту')}}: <a href="https://runsite.com.ua" target="_blank" title="{{__('Рансайт ТОВ - Розробка та підтримка сайтів')}}">{{__('Рансайт ТОВ')}}</a>
        </div>
      </div>
    </footer>



    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script src="{{asset('asset/js/pace.min.js')}}" async></script>
    <script src="{{asset('asset/js/webApp.js')}}" async></script>
    <script src="{{asset('asset/js/scripts.js')}}" async></script>

    {{-- [END] Scripts --}}
  </body>
</html>@endif
