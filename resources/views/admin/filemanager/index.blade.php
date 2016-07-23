@extends('admin.app')
@section('content')

<div class="app-header navbar bg-dark">
  <nav class="navbar">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="navbar hidden-xs">
        <ul class="nav navbar-nav">
          <li class="active">
            <a href="{{route('admin.languages.items')}}"><i class="fa fa-server" aria-hidden="true"></i> {{trans('admin/filemanager.filemanager')}}</a>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
  </nav>
</div>


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
