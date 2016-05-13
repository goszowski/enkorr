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

          @if(isset($node))
            @if($node->parent_id)
            <li>
              <a href="{{route('admin.nodes.edit', $node->parent_id)}}"><i class="fa fa-chevron-circle-left"></i></a>
            </li>
            @endif
            <li @if(\Request::route()->getName() == 'admin.nodes.edit') class="active" @endif>
              <a href="{{route('admin.nodes.edit', $node->id)}}"><i class="fa fa-refresh"></i></a>
            </li>
          @endif

          @if((isset($dependencies) and count($dependencies)) or (isset($NodeDependencies) and count($NodeDependencies)))
          <li class="dropdown">
            <a href="javascript:;" data-toggle="dropdown"><i class="fa fa-plus"></i> {{trans('admin/nodes.create')}}</a>
            <ul class="dropdown-menu">
              @foreach($NodeDependencies as $item)
              <li><a href="{{route('admin.nodes.create', [$item->classes->id, $node->id])}}">{{$item->classes->name_create}}</a></li>
              @endforeach
              @foreach($dependencies as $item)
              <li><a href="{{route('admin.nodes.create', [$item->classes->id, $node->id])}}">{{$item->classes->name_create}}</a></li>
              @endforeach
            </ul>
          </li>
          @endif

          @if(isset($node) and !isset($parent))
          <li @if(\Request::route()->getName() == 'admin.nodes.settings') class="active" @endif>
            <a href="{{route('admin.nodes.settings', $node->id)}}"><i class="fa fa-cog"></i> {{trans('admin/nodes.settings')}}</a>
          </li>

          {{-- <li @if(\Request::route()->getName() == 'admin.nodes.access') class="active" @endif>
            <a href="{{route('admin.nodes.edit', $node->id)}}"><i class="fa fa-users"></i> {{trans('admin/nodes.access')}}</a>
          </li> --}}

          <li @if(\Request::route()->getName() == 'admin.nodes.dependencies') class="active" @endif>
            <a href="{{route('admin.nodes.dependencies', $node->id)}}"><i class="fa fa-sitemap"></i> {{trans('admin/nodes.dependencies')}}</a>
          </li>
          @endif

        </ul>
      </div><!-- /.navbar-collapse -->
  </nav>
</div>
