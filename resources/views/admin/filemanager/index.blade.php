@extends('admin.app')
@section('content')
@include('admin.languages.partials.items_nav')

<div class="p-md">
  <div class="panel panel-default">
    <div class="panel-heading bg-white">
      <i class="fa fa-bars"></i> Менеджер файлів
    </div>

    <iframe src="{{asset('admin/elFinder-2.1.13/elfinder.html')}}" style="width: 100%; border: 0;" id="elfinder-iframe"></iframe>

    <script type="text/javascript">
      $(function(){
        $('#elfinder-iframe').height($(window).height() - 200);
      });
    </script>
  </div>
</div>
@stop
