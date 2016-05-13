<div class="form-group">
  <div class="bs-component">
    <a class="btn btn-sm @if(Route::current()->getName() == 'admin.classes.edit') btn-primary btn-raised @endif" href="{{route('admin.classes.edit', $class->id)}}" ole="tab">Edit</a>
    <a class="btn btn-sm @if(Route::current()->getName() == 'admin.fields.items') btn-primary btn-raised @endif" href="{{route('admin.fields.items', $class->id)}}" role="tab">Fields</a>
    <a class="btn btn-sm @if(Route::current()->getName() == 'admin.groups.items') btn-primary btn-raised @endif" href="{{route('admin.fields.items', $class->id)}}" role="tab">Groups</a>
  </div>
  <!-- <ul class="nav nav-pills">
    <li role="presentation" class="@if(Route::current()->getName() == 'admin.classes.edit') active @endif"><a href="{{route('admin.classes.edit', $class->id)}}" ole="tab">Home</a></li>
    <li role="presentation" class="@if(Route::current()->getName() == 'admin.fields.items') active @endif"><a href="{{route('admin.fields.items', $class->id)}}" role="tab">Fields</a></li>
    <li role="presentation" class="@if(Route::current()->getName() == 'admin.groups.items') active @endif"><a href="{{route('admin.fields.items', $class->id)}}" role="tab">Groups</a></li>
  </ul> -->
</div>
