
<div class="form-group  @if($errors->has('name')) has-warning @endif">
  <label for="field_name" class="col-md-2 control-label">{{trans('admin/classes.name')}}</label>
  <div class="col-md-10">
    <input class="form-control" type="text" name="name" id="field_name" value="@if(Request::old('name')){{Request::old('name')}}@else{{isset($class) ? $class->name : ''}}@endif">
    @if($errors->first('name'))<small class="text-danger">{{$errors->first('name')}}</small>@endif
  </div>
</div>

<div class="form-group  @if($errors->has('name_more')) has-warning @endif">
  <label for="field_name" class="col-md-2 control-label">{{trans('admin/classes.name_more')}}</label>
  <div class="col-md-10">
    <input class="form-control" type="text" name="name_more" id="field_name" value="@if(Request::old('name_more')){{Request::old('name_more')}}@else{{isset($class) ? $class->name_more : ''}}@endif">
    @if($errors->first('name_more'))<small class="text-danger">{{$errors->first('name_more')}}</small>@endif
  </div>
</div>

<div class="form-group  @if($errors->has('name_create')) has-warning @endif">
  <label for="field_name" class="col-md-2 control-label">{{trans('admin/classes.name_create')}}</label>
  <div class="col-md-10">
    <input class="form-control" type="text" name="name_create" id="field_name" value="@if(Request::old('name_more')){{Request::old('name_create')}}@else{{isset($class) ? $class->name_create : ''}}@endif">
    @if($errors->first('name_create'))<small class="text-danger">{{$errors->first('name_create')}}</small>@endif
  </div>
</div>

<div class="form-group @if($errors->has('shortname')) has-warning @endif">
  <label for="field_shortname" class="col-md-2 control-label">{{trans('admin/classes.shortname')}}</label>
  <div class="col-md-10">
    <input class="form-control" type="text" name="shortname" id="field_shortname" value="@if(Request::old('shortname')){{Request::old('shortname')}}@else{{isset($class) ? $class->shortname : ''}}@endif">
    @if($errors->first('shortname'))<small class="text-danger">{{$errors->first('shortname')}}</small>@endif
  </div>
</div>

<div class="form-group @if($errors->has('default_controller')) has-warning @endif">
  <label for="field_default_controller" class="col-md-2 control-label">{{trans('admin/classes.default_controller')}}</label>
  <div class="col-md-10">
    <input class="form-control" type="text" name="default_controller" id="field_default_controller" value="@if(Request::old('default_controller')){{Request::old('default_controller')}}@else{{isset($class) ? $class->default_controller : ''}}@endif">
    @if($errors->first('default_controller'))<small class="text-danger">{{$errors->first('default_controller')}}</small>@endif
  </div>
</div>

<div class="form-group @if($errors->has('nodename_label')) has-warning @endif">
  <label for="field_nodename_label" class="col-md-2 control-label">{{trans('admin/classes.nodename_label')}}</label>
  <div class="col-md-10">
    <input class="form-control" type="text" name="nodename_label" id="field_nodename_label" value="@if(Request::old('nodename_label')){{Request::old('nodename_label')}}@else{{isset($class) ? $class->nodename_label : ''}}@endif">
    @if($errors->first('nodename_label'))<small class="text-danger">{{$errors->first('nodename_label')}}</small>@endif
  </div>
</div>

<div class="form-group"><label class="col-md-2 control-label">&nbsp;</label>
  <div class="col-md-10">
    <div class="checkbox">
      <label class="ui-checks">
        <input type="checkbox" name="access_edit_name" @if(isset($class) and $class->access_edit_name) checked @endif>
        <i></i>
        {{trans('admin/classes.access_edit_name')}}
      </label>
    </div>
  </div>
</div>

<div class="form-group"><label class="col-md-2 control-label">&nbsp;</label>
  <div class="col-md-10">
    <div class="checkbox">
      <label class="ui-checks">
        <input type="checkbox" name="access_edit_shortname" id="access_edit_shortname" @if(isset($class) and $class->access_edit_shortname) checked @endif>
        <i></i>
        {{trans('admin/classes.access_edit_shortname')}}
      </label>
    </div>
  </div>
</div>

<div class="form-group"><label class="col-md-2 control-label">&nbsp;</label>
  <div class="col-md-10">
    <div class="checkbox">
      <label class="ui-checks">
        <input type="checkbox" name="limited_users_can_create" id="limited_users_can_create" @if(isset($class) and $class->limited_users_can_create) checked @endif>
        <i></i>
        {{trans('admin/classes.limited_users_can_create')}}
      </label>
    </div>
  </div>
</div>

<div class="form-group"><label class="col-md-2 control-label">&nbsp;</label>
  <div class="col-md-10">
    <div class="checkbox">
      <label class="ui-checks">
        <input type="checkbox" name="limited_users_can_delete" id="limited_users_can_delete" @if(isset($class) and $class->limited_users_can_delete) checked @endif>
        <i></i>
        {{trans('admin/classes.limited_users_can_delete')}}
      </label>
    </div>
  </div>
</div>

<div class="form-group"><label class="col-md-2 control-label">&nbsp;</label>
  <div class="col-md-10">
    <div class="checkbox">
      <label class="ui-checks">
        <input type="checkbox" name="show_in_admin_tree" id="show_in_admin_tree" @if(isset($class) and $class->show_in_admin_tree) checked @endif>
        <i></i>
        {{trans('admin/classes.show_in_admin_tree')}}
      </label>
    </div>
  </div>
</div>

<div class="form-group"><label class="col-md-2 control-label">&nbsp;</label>
  <div class="col-md-10">
    <div class="togglebutton">
      <label class="ui-checks">
        <input type="checkbox" name="cache" id="cache" @if(isset($class) and $class->cache) checked @endif>
        <i></i>
        {{trans('admin/classes.cache')}}
      </label>
    </div>
  </div>
</div>




@if(isset($class->created_at) and isset($class->updated_at))
<div class="form-group text-muted" style="font-size: 11px; margin-bottom: 0;">
  <label class="col-md-2 control-label">{{trans('admin/classes.created_at')}}</label>
  <div class="col-md-10" style="padding-top: 7px;">{{$class->created_at}}</div>
</div>

<div class="form-group text-muted" style="font-size: 11px;">
  <label class="col-md-2 control-label">{{trans('admin/classes.updated_at')}}</label>
  <div class="col-md-10" style="padding-top: 7px;">{{$class->updated_at}}</div>
</div>
@endif
