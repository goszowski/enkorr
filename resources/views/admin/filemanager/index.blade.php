@extends('admin.app')
@section('content')


<link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{asset('admin/elFinder-2.1.13/css/elfinder.full.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/elFinder-2.1.13/css/windows-10/css/theme.css')}}">
<script src="{{asset('admin/elFinder-2.1.13/js/elfinder.full.js')}}"></script>
<script src="{{asset('admin/elFinder-2.1.13/js/i18n/elfinder.'.config('app.locale').'.js')}}"></script>

<div class="p-md">
  <div class="panel panel-default">
    <div class="panel-heading bg-white">
      <i class="fa fa-server" aria-hidden="true"></i> {{trans('admin/filemanager.filemanager')}}
    </div>
    <div id="elfinder"></div>

  </div>
</div>


<script type="text/javascript" charset="utf-8">
  // Documentation for client options:
  // https://github.com/Studio-42/elFinder/wiki/Client-configuration-options
  $(document).ready(function() {
    $('#elfinder').elfinder({
      url : '/admin/elFinder-2.1.13/php/connector.minimal.php'  // connector URL (REQUIRED)
      , lang: '{{config('app.locale')}}'                    // language (OPTIONAL)
    });
  });
</script>
@stop
