@include('admin.partials._head')
<style media="screen">
html, body {
height: 100%;
overflow: hidden;
}
body {
padding: 50px 0 0 0;
}

.navmenu {
padding-top: 50px;
}

.navbar {
display: block;
text-align: center;
}
/*.navbar-brand {
display: inline-block;
float: none;
}*/
/*.navbar-toggle {
position: absolute;
float: left;
margin-left: 15px;
}

.container {
max-width: 100%;
}*/

@media (min-width: 1px) {
/*.navbar-toggle {
  display: block !important;
}*/
}

@media (min-width: 992px) {
body {
  padding: 0 0 0 350px;
}
.navmenu {
  padding-top: 0;
}
.navbar {
  /*display: none !important; /* IE8 fix */
}
}

.app-iframe {width: 100%; height: 100%; border: 0; margin: 0; padding: 0;}
</style>
<div class="navmenu navmenu-default navmenu-fixed-left offcanvas-sm bg-dark" style="border: 0;">
  <div class="navbar">
    <div class="navbar-header bg-dark dk" style="width: 100%;">
      <!-- brand -->
      <a class="navbar-brand text-lt text-left" style="width: 100%;" href="/" target="_blank">
        <span class="hidden-folded">runsite::CMS<sup class="text-xs font-thin">1.1</sup></span>
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
        <li><a href="{{route($app->execute)}}" target="app_iframe">{{$app->name}}</a></li>
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
              console.log(node);
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
<iframe class="app-iframe" src="/panel-admin/nodes/edit/1" name="app_iframe"></iframe>
@include('admin.partials._foot')
