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
                <li class="header">У вас <span id="notify-cnt-more">0</span> сповіщень</li>
              </ul>
            </li>
            <li class="dropdown ">
              <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-user"></i> {{\Auth::user()->name}} <span class="caret"></span></a>
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
              @if($apps)
              <ul>
                @foreach($apps as $app)
                <li><a href="{{route($app->execute)}}" target="app_iframe">{{trans($app->name)}}</a></li>
                @endforeach
                <li><a href="{{url('panel-admin/notify')}}" target="app_iframe">Notify</a></li>
              </ul>
              @endif

            </div>

            <div id="admin-nodes-tree" class="m-t-md"></div>



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
      <strong>Copyright &copy; <a href="http://runsite.com.ua" target="_blank">ТОВ Рансайт</a>.</strong>
      <span class="hidden-xs">Всі права захищено.</span>
    </footer>

  </div>
</body>
@include('admin.partials._foot')
