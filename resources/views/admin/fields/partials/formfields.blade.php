
<div class="form-group  @if($errors->has('type_id')) has-warning @endif">
  <label for="field_type_id" class="col-md-2 control-label">{{trans('admin/fields.field_type')}}</label>
  <div class="col-md-10">
    <select class="form-control" name="type_id" id="field_type_id">
      <option value="">-- {{trans('admin/fields.select_type')}} --</option>
      @if(count($field_types))
        @foreach($field_types as $type_item)
          <option value="{{$type_item->id}}" @if(isset($field) and $type_item->id == $field->type_id) selected @endif>{{$type_item->name}}</option>
        @endforeach
      @endif
    </select>
    @if($errors->first('type_id'))<small class="text-danger">{{$errors->first('type_id')}}</small>@endif
  </div>
</div>

<div class="form-group  @if($errors->has('group_id')) has-warning @endif">
  <label for="field_group_id" class="col-md-2 control-label">{{trans('admin/fields.group')}}</label>
  <div class="col-md-10">
    <select class="form-control" name="group_id" id="field_group_id">
      <option value="">-- {{trans('admin/fields.select_group')}} --</option>
      @if(count($groups))
        @foreach($groups as $group_item)
          <option value="{{$group_item->id}}" @if(isset($field) and $group_item->id == $field->group_id) selected @endif>{{$group_item->name}}</option>
        @endforeach
      @endif
    </select>
    @if($errors->first('group_id'))<small class="text-danger">{{$errors->first('group_id')}}</small>@endif
  </div>
</div>

<div class="form-group  @if($errors->has('name')) has-warning @endif">
  <label for="field_name" class="col-md-2 control-label">{{trans('admin/fields.name')}}</label>
  <div class="col-md-10">
    <input class="form-control" type="text" name="name" id="field_name" value="@if(Request::old('name')){{Request::old('name')}}@else{{isset($field) ? $field->name : ''}}@endif">
    @if($errors->first('name'))<small class="text-danger">{{$errors->first('name')}}</small>@endif
  </div>
</div>

<div class="form-group  @if($errors->has('shortname')) has-warning @endif">
  <label for="field_shortname" class="col-md-2 control-label">{{trans('admin/fields.shortname')}}</label>
  <div class="col-md-10">
    <input class="form-control" type="text" name="shortname" id="field_shortname" value="@if(Request::old('shortname')){{Request::old('shortname')}}@else{{isset($field) ? $field->shortname : ''}}@endif">
    @if($errors->first('shortname'))<small class="text-danger">{{$errors->first('shortname')}}</small>@endif
  </div>
</div>

<div class="form-group  @if($errors->has('hint')) has-warning @endif">
  <label for="field_hint" class="col-md-2 control-label">{{trans('admin/fields.hint')}}</label>
  <div class="col-md-10">
    <input class="form-control" type="text" name="hint" id="field_hint" value="@if(Request::old('hint')){{Request::old('hint')}}@else{{isset($field) ? $field->hint : ''}}@endif">
    @if($errors->first('hint'))<small class="text-danger">{{$errors->first('hint')}}</small>@endif
  </div>
</div>




<div class="form-group"><label class="col-md-2 control-label">&nbsp;</label>
  <div class="col-md-10">
    <div class="checkbox">
      <label class="ui-checks">
        <input type="checkbox" name="required" id="required" @if(isset($field) and $field->required) checked @endif>
        <i></i>
        {{trans('admin/fields.required')}}
      </label>
    </div>
  </div>
</div>

<div class="form-group"><label class="col-md-2 control-label">&nbsp;</label>
  <div class="col-md-10">
    <div class="checkbox">
      <label class="ui-checks">
        <input type="checkbox" name="shown" id="shown" @if(isset($field) and $field->shown) checked @endif>
        <i></i>
        {{trans('admin/fields.shown')}}
      </label>
    </div>
  </div>
</div>

<div class="form-group"><label class="col-md-2 control-label">&nbsp;</label>
  <div class="col-md-10">
    <div class="checkbox">
      <label class="ui-checks">
        <input type="checkbox" name="ignore_language" id="ignore_language" @if(isset($field) and $field->ignore_language) checked @endif>
        <i></i>
        {{trans('admin/fields.ignore_language')}}
      </label>
    </div>
  </div>
</div>




@if(isset($field->created_at) and isset($field->updated_at))
<div class="form-group text-muted" style="font-size: 11px; margin-bottom: 0;">
  <label class="col-md-2 control-label">{{trans('admin/fields.created_at')}}</label>
  <div class="col-md-10" style="padding-top: 7px;">{{$field->created_at}}</div>
</div>

<div class="form-group text-muted" style="font-size: 11px;">
  <label class="col-md-2 control-label">{{trans('admin/fields.updated_at')}}</label>
  <div class="col-md-10" style="padding-top: 7px;">{{$field->updated_at}}</div>
</div>
@endif
