<link rel="stylesheet" href="{{asset('admin/admin-resources/bower_components/AdminLTE/dist/css/AdminLTE.css')}}">
<link rel="stylesheet" href="{{asset('admin/admin-resources/bower_components/AdminLTE/dist/css/skins/_all-skins.css')}}">
<link rel="stylesheet" href="{{asset('admin/admin-resources/less-space/less-space.css')}}" media="screen" charset="utf-8">
<script type="text/javascript" src="{{asset('admin/admin-resources/bower_components/AdminLTE/dist/js/app.js')}}"></script>
<script type="text/javascript">
$(function() {
  $('.slim-scroll').slimScroll({
      height: 'auto'
  });

  $(window).resize(function(){
    $('.slim-scroll').slimScroll({
        height: 'auto'
    });
  });
});
</script>
