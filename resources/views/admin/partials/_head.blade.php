<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel Admin - runsite::CMS</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>


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

    <link rel="stylesheet" href="{{_asset('admin/font-awesome-4.5.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{_asset('admin/bootstrap-3.3.6-dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{_asset('admin/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" href="{{_asset('admin/bootstrap-datetimepicker/bootstrap-datetimepicker-standalone.css')}}">
    <link rel="stylesheet" href="{{_asset('admin/magnific-popup/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{_asset('admin/jqueryfiletree-master/dist/jQueryFileTree.min.css')}}">
    <link rel="stylesheet" href="{{_asset('admin/runsite-input-progress/style.css')}}">
    <link rel="stylesheet" href="{{_asset('admin/admin-resources/bower_components/AdminLTE/plugins/select2/select2.css')}}">

    <!-- Latest compiled and minified JavaScript -->
    <script src="{{_asset('admin/bootstrap-3.3.6-dist/js/bootstrap.min.js')}}"></script>
    <script src="{{_asset('admin/moment-develop/min/moment-with-locales.min.js')}}"></script>
    <script src="{{_asset('admin/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{_asset('admin/bootstrap-notify.min.js')}}"></script>
    <script src="{{_asset('admin/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{_asset('admin/jqueryfiletree-master/dist/jQueryFileTree.min.js')}}"></script>
    <script src="{{_asset('admin/runsite-input-progress/script.js')}}"></script>
    <script src="{{_asset('admin/admin-resources/bower_components/AdminLTE/plugins/select2/select2.js')}}"></script>
    <script src="{{_asset('admin/admin-resources/bower_components/AdminLTE/plugins/slimScroll/jquery.slimscroll.js')}}"></script>

    {{-- <script src="https://almsaeedstudio.com/themes/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js"></script> --}}

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>

    <link rel="stylesheet" href="{{_asset('admin/hey-metro.css?1')}}" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="{{_asset('admin/app.css?2')}}" media="screen" title="no title" charset="utf-8">


    <link rel="stylesheet" href="{{_asset('admin/jstree/themes/default-dark/style.css')}}" />
    <script src="{{_asset('admin/jstree/jstree.min.js')}}"></script>

    <link rel="stylesheet" href="{{_asset('admin/lobibox/lobibox.css')}}"/>
    <script src="{{_asset('admin/lobibox/lobibox.js')}}"></script>
    <script src="{{_asset('admin/lobibox/notifications.js')}}"></script>

    <link rel="stylesheet" href="{{_asset('admin/bootstrap-select.css')}}" />
    <script src="{{_asset('admin/bootstrap-select.js')}}"></script>

    <link rel="stylesheet" href="{{_asset('admin/flag-icon-css-master/css/flag-icon.css')}}">

    <script src="{{_asset('admin/ckeditor/ckeditor.js?1')}}"></script>
    <script src="{{_asset('admin/ckeditor/styles.js')}}"></script>
    <script src="{{_asset('admin/app.js')}}"></script>
    {{-- <script src="{{asset('admin/noty/promise.js')}}"></script> --}}
    <script src="{{_asset('admin/noty/packaged/jquery.noty.packaged.js')}}"></script>

    <script type="text/javascript">
    function youtube_parser(url){
        var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
        var match = url.match(regExp);
        return (match&&match[7].length==11)? match[7] : false;
    }
      $(function(){

        $('form').on('submit', function(e){
          var submitBtn = $(this).find('button[type=submit]');
          submitBtn.attr('disabled', 'true');
          submitBtn.html('<i class="fa fa-refresh fa-spin"></i>');
          // return true;
        });


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

        $('.select2.tags').select2({
          tags: true,
        });

        $('.select2.search-tags').select2({
          ajax: {
              url: "{{route('admin.gallery.search-tag')}}",
              dataType: 'json',
              cache: true,
              data: function (term, page) {
                return {
                  q: term
                }
              }
            }
        });

        $('.select2-autocomplete').each(function() {
          var current = $(this);
          var linked_class = current.data('linked-class');
          var parent_id = current.data('parent-id');

          current.select2({
            ajax: {
              url: "{{route('admin.autocomplete')}}?linked_class="+linked_class+"&parent_id="+parent_id,
              dataType: 'json',
              cache: true,
              data: function (term, page) {
                return {
                  q: term
                }
              }
            }
          });


        });

        $('.select2-autocomplete-group').each(function() {
          var current = $(this);
          var linked_class = current.data('linked-class');
          var parent_id = current.data('parent-id');

          current.select2({
            multiple: true,

            ajax: {
              url: "{{route('admin.autocomplete')}}?linked_class="+linked_class+"&parent_id="+parent_id,
              dataType: 'json',
              cache: true,
              data: function (term, page) {
                return {
                  q: term
                }
              }
            }
          });

        });




      });
    </script>


    @if(\Session::has('alert-success'))
        <script type="text/javascript">
          $(function() {
            noty({
              theme: 'app-noty',
              text: '{{\Session::get('alert-success')}}',
              type: 'success',
              timeout: 3000,
              layout: 'top',
              closable: true,
              closeOnSelfClick: true,
              animation: {
                open: {show: 'toggle'},
                close: {show: 'toggle'}
              }
            });
          });
        </script>
    @endif

    @if(\Session::has('alert-error'))
        <script type="text/javascript">
          $(function() {
            noty({
              theme: 'app-noty',
              text: '{{\Session::get('alert-error')}}',
              type: 'error',
              timeout: 3000,
              layout: 'top',
              closable: true,
              closeOnSelfClick: true,
              animation: {
                open: {show: 'toggle'},
                close: {show: 'toggle'}
              }
            });
          });
        </script>
    @endif

    @if(\Session::has('alert-warning'))
        <script type="text/javascript">
          $(function() {
            noty({
              theme: 'app-noty',
              text: '{{\Session::get('alert-warning')}}',
              type: 'warning',
              timeout: 3000,
              layout: 'top',
              closable: true,
              closeOnSelfClick: true,
              animation: {
                open: {show: 'toggle'},
                close: {show: 'toggle'}
              }
            });
          });
        </script>
    @endif

    @if(\Session::has('alert-info'))
        <script type="text/javascript">
          $(function() {
            noty({
              theme: 'app-noty',
              text: '{{\Session::get('alert-info')}}',
              type: 'information',
              timeout: 3000,
              layout: 'top',
              closable: true,
              closeOnSelfClick: true,
              animation: {
                open: {show: 'toggle'},
                close: {show: 'toggle'}
              }
            });
          });
        </script>
    @endif
  </head>
