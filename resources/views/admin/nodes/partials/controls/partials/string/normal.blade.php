<div class="form-group">
  <label for="field_{{ $field_name }}_{{ $field_lang }}" class="col-md-2 control-label"><div class="text-left">{{ $field_label }}:</div></label>
  <div class="col-md-10">
    <input maxlength="{{ \App\Runsite\Field_settings::pull($settings, 'db_field_size') }}" class="form-control" type="text" name="langs[{{$field_lang}}][{{$field_name}}]" id="field_{{ $field_name }}_{{ $field_lang }}" value="{{ $field_value }}">
  </div>
</div>
