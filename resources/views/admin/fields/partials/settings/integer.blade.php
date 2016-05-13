<div class="form-group">
  <label for="{{$item->_parameter}}" class="col-md-2 control-label">{{trans('admin/fields.'.$item->_parameter)}}</label>
  <div class="col-md-10">
    <input type="hidden" name="settings[{{$item->id}}][_parameter]" value="{{$item->_parameter}}">
    <input class="form-control" type="text" name="settings[{{$item->id}}][_value]" id="{{$item->_parameter}}" value="{{$item->_value}}" @if($item->_parameter == 'db_field_type' or ($item->_parameter == 'db_field_size' and !$item->_value)) disabled @endif>
  </div>
</div>
