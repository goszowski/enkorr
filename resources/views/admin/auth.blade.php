<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel Admin - runsite::CMS</title>
    <link rel="stylesheet" href="{{asset('admin/bootstrap-3.3.6-dist/css/bootstrap.min.css')}}" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="{{asset('admin/admin-resources/bower_components/AdminLTE/dist/css/AdminLTE.css')}}">
    <link rel="stylesheet" href="{{asset('admin/admin-resources/bower_components/AdminLTE/dist/css/skins/_all-skins.css')}}">
    <link rel="stylesheet" href="{{asset('admin/iCheck/all.css')}}" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="{{asset('admin/admin-resources/auth/auth.css')}}" media="screen" charset="utf-8">
    <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic&subset=latin,cyrillic,latin-ext,cyrillic-ext' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" type="image/png" href="{{asset('favicon.ico')}}">
    <style media="screen">
      body {
        font-family: 'PT Sans';
        overflow: hidden;
      }
      .login-background {
        position: absolute;
        left: 0; top: 0; right: 0; bottom: 0;
        z-index: -1;
        background-size: cover;
        background-position: center bottom;
        transform: scale(1.1, 1.1);
        opacity: 0;
        transition: transform 400ms, opacity 700ms;
      }

      .login-background.noscale {
        transform: scale(1, 1);
        opacity: 1;
      }

      .login-background:before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        background: rgba(201,200,199, 0.7);
        z-index: -1;
        box-shadow: inset 0 0 170px rgba(0,0,0, 0.8);
      }
    </style>
  </head>
  <body class="hold-transition login-page" style="background-image: none;">
    <img src="" id="bgImgPreload" style="opacity: 0; position: absolute; visibility: hidden; z-index: -199;" />
    <div class="login-background"></div>
    <div class="login-box">

      @yield('content')
    </div>
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="{{asset('admin/bootstrap-3.3.6-dist/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/iCheck/icheck.min.js')}}"></script>

    <script type="text/javascript">
    if (top.location.href != self.location.href) { top.location.href = self.location.href; }
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
      });
      // $('body').html('');
      var bgImage = "http://api.runsite.com.ua/login-background-image?width="+$(window).width();
      $('.login-background').css('background-image', "url("+bgImage+")");
      $("#bgImgPreload").attr('src', bgImage);
      $("#bgImgPreload").load(function() {
        $('.login-background').addClass('noscale');
      });
      // setTimeout(function() {
      //   $('.login-background').addClass('noscale');
      // }, 100);
    });
    </script>
  </body>
</html>
