<label for="field_{{ $field_name }}_{{ $field_lang }}" class="col-md-2 control-label" style="padding-top: 0;"><div class="text-left">{{ $field_label }}:</div></label>
<div class="col-md-10">

  @if($field_value)
    <span class="label bg-success">{{trans('admin/nodes.yes')}}</span>
    <input type="hidden" name="langs[{{$field_lang}}][{{$field_name}}]" value="1">
  @else
    <span class="label bg-danger">{{trans('admin/nodes.no')}}</span>
    <input type="hidden" name="langs[{{$field_lang}}][{{$field_name}}]" value="0">
  @endif



</div>
