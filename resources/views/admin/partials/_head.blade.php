<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Panel Admin - runsite::CMS</title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>


    {{--
      <!-- Latest compiled and minified CSS -->
      <!-- <link rel="stylesheet" href="{{asset('admin/bootstrap-3.3.6-dist/css/bootstrap.min.css')}}"> -->

      <!-- <link rel="stylesheet" type="text/css" href="{{asset('admin/awesome-bootstrap-checkbox.css')}}" > -->
      <!-- <link rel="stylesheet" href="{{asset('admin/font-awesome-4.5.0/css/font-awesome.min.css')}}">
      <link rel="stylesheet" href="{{asset('admin/bootstrap-material-design.min.css')}}" media="screen" title="no title" charset="utf-8">
      <link href="{{asset('admin/ripples.min.css')}}" rel="stylesheet">
      <script src="{{asset('admin/material.min.js')}}"></script>
      <script src="{{asset('admin/ripples.min.js')}}"></script> -->


    --}}
    <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic&subset=latin,cyrillic,latin-ext,cyrillic-ext' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="{{asset('admin/font-awesome-4.5.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/bootstrap-3.3.6-dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/bootstrap-datetimepicker/bootstrap-datetimepicker-standalone.css')}}">
    <link rel="stylesheet" href="{{asset('admin/magnific-popup/magnific-popup.css')}}">

    <!-- Latest compiled and minified JavaScript -->
    <script src="{{asset('admin/bootstrap-3.3.6-dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/moment-develop/min/moment-with-locales.min.js')}}"></script>
    <script src="{{asset('admin/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{asset('admin/bootstrap-notify.min.js')}}"></script>
    <script src="{{asset('admin/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>

    <link rel="stylesheet" href="{{asset('admin/hey-metro.css')}}" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="{{asset('admin/app.css')}}" media="screen" title="no title" charset="utf-8">


    <link rel="stylesheet" href="{{asset('admin/jstree/themes/default-dark/style.css')}}" />
    <script src="{{asset('admin/jstree/jstree.min.js')}}"></script>

    <link rel="stylesheet" href="{{asset('admin/lobibox/lobibox.css')}}"/>
    <script src="{{asset('admin/lobibox/lobibox.js')}}"></script>
    <script src="{{asset('admin/lobibox/notifications.js')}}"></script>

    <link rel="stylesheet" href="{{asset('admin/bootstrap-select.css')}}" />
    <script src="{{asset('admin/bootstrap-select.js')}}"></script>

    <link rel="stylesheet" href="{{asset('admin/flag-icon-css-master/css/flag-icon.css')}}">

    <script src="{{asset('admin/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('admin/app.js')}}"></script>

    <script type="text/javascript">
      $(function(){
        $('.datetimepicker').datetimepicker({
          locale: '{{config('app.locale')}}',
          format: 'YYYY-MM-DD HH:mm:ss'
        });

        $('.magnific-wrapper').each(function(){
          $(this).magnificPopup({
            delegate: 'a.magnific',
            type: 'image',
            gallery: {
              enabled: true
            }
          });
        });
      });
    </script>
  </head>
  <body>
