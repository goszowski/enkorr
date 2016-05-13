@if(! ($ignore_language and $lang_key))
<div class="form-group">
  <label for="field_{{ $field_name }}_{{ $field_lang }}" class="col-md-2 control-label"><div class="text-left">{{ $field_label }}:</div></label>
  <div class="col-md-10">
    <textarea class="form-control" name="langs[{{$field_lang}}][{{$field_name}}]" id="field_{{ $field_name }}_{{ $field_lang }}">{{ $field_value }}</textarea>
  </div>
</div>
@endif
