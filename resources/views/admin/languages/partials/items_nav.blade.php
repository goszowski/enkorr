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
          <li @if(\Request::route()->getName() == 'admin.languages.items') class="active" @endif><a href="{{route('admin.languages.items')}}"><i class="fa fa-terminal"></i> Languages</a></li>

          @if(\Request::route()->getName() != 'admin.languages.edit' and \Request::route()->getName() != 'admin.languages.remove_confirmation')
          <li @if(\Request::route()->getName() == 'admin.languages.create') class="active" @endif><a href="{{route('admin.languages.create')}}"><i class="fa fa-plus"></i> {{trans('admin/languages.create')}}</a></li>
          @endif

          @if(\Request::route()->getName() == 'admin.languages.edit' or \Request::route()->getName() == 'admin.languages.remove_confirmation')
          <li class="active"><a href="{{route('admin.languages.edit', $lang->id)}}"><i class="fa fa-pencil-square-o"></i> {{trans('admin/languages.edit')}}</a></li>
          @endif
        </ul>
      </div><!-- /.navbar-collapse -->
  </nav>
</div>
