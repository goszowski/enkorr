<div class="form-group">
  <label class="col-md-2 control-label" style="padding-top: 0;"><div class="text-left">{{ $field_label }}:</div></label>
  <div class="col-md-10">
    <input type="hidden" name="langs[{{$field_lang}}][{{$field_name}}]" value="{{ $field_value }}">
    {{ $field_value }}
  </div>
</div>
