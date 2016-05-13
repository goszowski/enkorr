@if(isset($controls))
<div class="form-group">
  <label for="{{$item->_parameter}}" class="col-md-2 control-label">{{trans('admin/fields.'.$item->_parameter)}}</label>
  <div class="col-md-10">
    <input type="hidden" name="settings[{{$item->id}}][_parameter]" value="{{$item->_parameter}}">
    <select class="form-control" name="settings[{{$item->id}}][_value]" id="{{$item->_parameter}}">
      @foreach($controls as $variant)
      <option value="{{$variant->type_variant}}" @if($variant->type_variant == $item->_value) selected @endif>{{ trans('admin/fields.'.$variant->type_variant) }}</option>
      @endforeach
    </select>
  </div>
</div>
@endif
