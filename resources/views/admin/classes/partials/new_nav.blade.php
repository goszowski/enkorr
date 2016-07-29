<ul class="nav nav-sm nav-tabs lang-tabs">
  <li @if(\Request::route()->getPrefix() == 'panel-admin/classes') class="active" @endif><a href="{{route('admin.classes.edit', $class->id)}}"><i class="fa fa-pencil-square-o"></i> Edit</a></li>
  <li @if(\Request::route()->getPrefix() == 'panel-admin/fields') class="active" @endif><a href="{{route('admin.fields.items', $class->id)}}"><i class="fa fa-th-list"></i> Fields</a></li>
  <li @if(\Request::route()->getPrefix() == 'panel-admin/groups') class="active" @endif><a href="{{route('admin.groups.items', $class->id)}}"><i class="fa fa-object-group"></i> Groups</a></li>
  <li @if(\Request::route()->getPrefix() == 'panel-admin/dependencies') class="active" @endif><a href="{{route('admin.dependencies.view', $class->id)}}"><i class="fa fa-sitemap"></i> Dependencies</a></li>
</ul>
