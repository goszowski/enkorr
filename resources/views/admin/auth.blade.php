<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Panel Admin - runsite::CMS</title>
    <link rel="stylesheet" href="{{asset('admin/bootstrap-3.3.6-dist/css/bootstrap.min.css')}}" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="{{asset('admin/admin-lte/AdminLTE.css')}}" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="{{asset('admin/admin-lte/skins/_all-skins.css')}}" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="{{asset('admin/iCheck/all.css')}}" media="screen" title="no title" charset="utf-8">
    <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic&subset=latin,cyrillic,latin-ext,cyrillic-ext' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" type="image/png" href="{{asset('favicon.ico')}}">
    <style media="screen">
      body {
        font-family: 'PT Sans';
      }
    </style>
  </head>
  <body class="hold-transition login-page">
    @yield('content')

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
    });
    </script>
  </body>
</html>
