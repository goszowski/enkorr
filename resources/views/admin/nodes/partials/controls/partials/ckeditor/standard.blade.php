<div class="form-group">
  <label for="field_{{ $field_name }}_{{ $field_lang }}" class="col-md-2 control-label"><div class="text-left">{{ $field_label }}:</div></label>
  <div class="col-md-10">
    <textarea class="form-control" name="langs[{{$field_lang}}][{{$field_name}}]" id="field_{{ $field_name }}_{{ $field_lang }}">{{ $field_value }}</textarea>
  </div>
</div>
<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('field_{{ $field_name }}_{{ $field_lang }}', {
      language: '{{Config::get('app.locale')}}',
      skin: 'office2013',
      toolbar: 'standard',

      @if(\App\Runsite\Field_settings::pull($settings, 'require_css_file'))
      contentsCss: '{{asset(\App\Runsite\Field_settings::pull($settings, 'require_css_file'))}}',
      @endif
    });
</script>
