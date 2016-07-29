<div class="form-group  @if($errors->has('locale')) has-warning @endif">
  <label for="field_locale" class="col-md-2 control-label">{{trans('admin/languages.locale')}}</label>
  <div class="col-md-10">
    <input class="form-control" type="text" name="locale" id="field_locale" value="@if(Request::old('locale')){{Request::old('locale')}}@else{{isset($lang) ? $lang->locale : ''}}@endif">
    @if($errors->first('locale'))<small class="text-danger">{{$errors->first('locale')}}</small>@endif
  </div>
</div>

<div class="form-group  @if($errors->has('name')) has-warning @endif">
  <label for="field_name" class="col-md-2 control-label">{{trans('admin/languages.name')}}</label>
  <div class="col-md-10">
    <input class="form-control" type="text" name="name" id="field_name" value="@if(Request::old('name')){{Request::old('name')}}@else{{isset($lang) ? $lang->name : ''}}@endif">
    @if($errors->first('name'))<small class="text-danger">{{$errors->first('name')}}</small>@endif
  </div>
</div>


<div class="form-group"><label class="col-md-2 control-label">&nbsp;</label>
  <div class="col-md-10">
    <div class="checkbox">
      <label class="ui-checks">
        <input type="checkbox" name="is_active" id="is_active" @if(isset($lang) and $lang->is_active) checked @endif>
        <i></i>
        {{trans('admin/languages.is_active')}}
      </label>
    </div>
  </div>
</div>


@if(isset($lang) and !$lang->is_default)
<div class="form-group"><label class="col-md-2 control-label">&nbsp;</label>
  <div class="col-md-10">
    <div class="checkbox">
      <label class="ui-checks">
        <input type="checkbox" name="is_default" id="is_default">
        <i></i>
        {{trans('admin/languages.is_default')}}
      </label>
    </div>
  </div>
</div>
@endif



@if(isset($lang->created_at) and isset($lang->updated_at))
<div class="form-group text-muted" style="font-size: 11px; margin-bottom: 0;">
  <label class="col-md-2 control-label">{{trans('admin/languages.created_at')}}</label>
  <div class="col-md-10" style="padding-top: 7px;">{{$lang->created_at}}</div>
</div>

<div class="form-group text-muted" style="font-size: 11px;">
  <label class="col-md-2 control-label">{{trans('admin/languages.updated_at')}}</label>
  <div class="col-md-10" style="padding-top: 7px;">{{$lang->updated_at}}</div>
</div>
@endif
