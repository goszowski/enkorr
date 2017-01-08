@include('admin.partials._head')
@include('admin.partials._head_wrapper')
<style media="screen">


.app-iframe {width: 100%; height: calc(100vh - 110px); border: 0; margin: 0; padding: 0;}
@media (max-width: 768px) {
  .app-iframe {width: 100%; height: calc(100vh - 210px); border: 0; margin: 0; padding: 0;}
}
</style>
{{-- <div class="navmenu navmenu-default navmenu-fixed-left offcanvas-sm bg-dark" style="border: 0;">
  <div class="navbar">
    <div class="navbar-header bg-dark dk" style="width: 100%;">
      <!-- brand -->
      <a class="navbar-brand text-lt text-left" style="width: 100%;" href="/" target="_blank">
        <span class="hidden-folded">runsite::CMS<sup class="text-xs font-thin">{{config('app.app_version')}}</sup></span>
      </a>

      <a href="{{route('admin.auth.logout')}}" class="sign-out"><i class="fa fa-sign-out"></i></a>
      <!-- / brand -->
    </div>
  </div>


  <div class="p-sm ">
    <div id="admin-apps-tree">
      @if($apps)
      <ul>
        @foreach($apps as $app)
        <li><a href="{{route($app->execute)}}" target="app_iframe">{{trans($app->name)}}</a></li>
        @endforeach
      </ul>
      @endif
    </div>

    <div id="admin-nodes-tree" class="m-t-md"></div>
  </div>

  <script type="text/javascript">
    $(function(){
      $('#admin-apps-tree').jstree({
        'core': {
          'themes': {
            'name': 'default-dark'
          }
        }
      }).on('changed.jstree', function(e, data){
        $('[name="app_iframe"]').attr('src', data.node.a_attr.href);
      });

      $('#admin-nodes-tree').jstree({
        'core': {
          'themes': {
            'name': 'default-dark'
          },
          'data': {
            'url': '{{route("admin.tree")}}',
            'data': function(node) {
              // console.log(node);
              return { 'parent_id' : node.id }
            }
          }
        }
      }).on('changed.jstree', function(e, data){
        $('[name="app_iframe"]').attr('src', data.node.a_attr.href);
      });
    });
  </script>

</div>
<iframe class="app-iframe" src="/panel-admin/nodes/edit/1" name="app_iframe"></iframe> --}}

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <!-- Logo -->
      <a href="{{asset('/')}}" target="_blank" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>R</b>S</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img src="{{asset('admin/admin-resources/images/runsite-cmf-logo.svg')}}" style="max-width: 150px; margin-left: -20px;" alt="" /> <sup>{{Config::get('app.app_version')}}</sup></span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown notifications-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell-o"></i><span class="label label-warning" id="notify-cnt"></span></a>
              <ul class="dropdown-menu">
                <li class="header"><small>У вас <span id="notify-cnt-more">0</span> сповіщень</small></li>
                <li>
                  <ul class="menu" id="notifications-items"></ul>
                </li>
                <li class="footer">
                  <a href="{{url('panel-admin/notify')}}" target="app_iframe">Усі сповіщення</a>
                </li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="text-uppercase">{{ LaravelLocalization::getCurrentLocale() }}</span> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                @foreach(App\Runsite\Languages::get() as $lang)
                  <li>
                    <a href="{{url($lang->locale.'/panel-admin')}}">{{$lang->name}}</a>
                  </li>
                @endforeach
              </ul>
            </li>
            <li class="dropdown ">
              <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-user"></i> <span class="hidden-xs">{{\Auth::user()->name}}</span> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li ><a href="{{route('admin.auth.logout')}}"><i class="fa fa-sign-out"></i> Log out</a></li>
              </ul>
            </li>
          </ul>


        </div>
      </nav>
    </header>

    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar slim-scroll xs-pb-50">
        <div class="xs-p-10">



            <div id="admin-apps-tree">
              <ul>
                @if(! \Auth::user()->is_limited)
                  <li><a href="{{url('panel-admin/classes')}}" target="app_iframe">Models</a></li>
                @endif

                @if(! \Auth::user()->is_limited)
                  <li><a href="{{url('panel-admin/users')}}" target="app_iframe">Users</a></li>
                @endif

                <li><a href="{{url('panel-admin/notify')}}" target="app_iframe">Notify</a></li>
                <li><a href="{{url('panel-admin/events/list')}}" target="app_iframe">Events</a></li>
                <li><a href="{{url('panel-admin/filemanager')}}" target="app_iframe">Filemanager</a></li>
                <li><a href="{{url('panel-admin/languages')}}" target="app_iframe">Languages</a></li>
                <li><a href="{{url('panel-admin/translations')}}" target="app_iframe">Translations</a></li>
              </ul>

            </div>

            <div id="admin-nodes-tree" class="m-t-md"></div>
            {{-- <audio src="{{asset('admin/soft-bells.ogg')}}" type="audio/ogg" id="notify_audio"></audio> --}}



          <script type="text/javascript">
            $(function(){
              var notify_audio = new Audio('{{asset('admin/soft-bells.ogg')}}');
              var notify_start = false;
              var notify_count = 0;


              $('#admin-apps-tree').jstree({
                'core': {
                  'themes': {
                    'name': 'default-dark'
                  }
                }
              }).on('changed.jstree', function(e, data){
                $('[name="app_iframe"]').attr('src', data.node.a_attr.href);
              });

              $('#admin-nodes-tree').jstree({
                'core': {
                  'themes': {
                    'name': 'default-dark'
                  },
                  'data': {
                    'url': '{{route("admin.tree")}}',
                    'data': function(node) {
                      // console.log(node);
                      return { 'parent_id' : node.id }
                    }
                  }
                }
              }).on('changed.jstree', function(e, data){
                $('[name="app_iframe"]').attr('src', data.node.a_attr.href);
              });

              function getNewNotyfications()
              {
                $.get('/panel-admin/notify/count', function(data) {
                  if(data == 0) data = '';
                  $('#notify-cnt, #notify-cnt-more').html(data);

                  $.getJSON('/panel-admin/notify/last', function(data) {
                    $('#notifications-items').html('');
                    $.each(data, function (index, value) {
                      var add_class = 'is_showed';
                      var icon = 'fa fa-flag';
                      var icon_color = 'info';
                      if(!value.user_views) add_class = '';

                      $('#notifications-items').append('<li class="' + add_class + '"><a target="app_iframe" href="{{url("panel-admin/notify")}}/'+value.id+'"><i class="'+icon+' text-'+icon_color+'" aria-hidden="true"></i>'+value.message+'</a></li>');
                        // console.log(value);
                    });
                  });


                  if(notify_start && data > notify_count)
                  {
                    notify_audio.play();
                  }

                  notify_start = true;
                  notify_count = data;


                });
              }

              getNewNotyfications();
              setInterval(function() {
                getNewNotyfications();
              }, 5000);







            });
          </script>


        </div>
      </section>
      <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper" id="app-container">
      <div id="app-container-inner">
        <iframe class="app-iframe" src="/panel-admin/nodes/edit/1" name="app_iframe"></iframe>
      </div>
    </div>

    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> {{Config::get('app.app_version')}}
      </div>
      <strong>Copyright &copy; <a href="http://runsite.com.ua" target="_blank">RUNSITE LLC</a>.</strong>
      <span class="hidden-xs">All rights reserved.</span>
    </footer>

  </div>
</body>
@include('admin.partials._foot')
