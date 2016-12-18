<div class="form-group">
  <label for="field_{{ $field_name }}_{{ $field_lang }}" class="col-md-2 control-label"><div class="text-left">{{ $field_label }} <small class="text-muted">[{{$field_name}}]</small></div></label>
  <div class="col-md-10">
    <textarea class="form-control" name="langs[{{$field_lang}}][{{$field_name}}]" id="field_{{ $field_name }}_{{ $field_lang }}">{{ $field_value }}</textarea>
    @if($hint)
      <div class="text-muted">
        <i class="fa fa-info" aria-hidden="true"></i> {{$hint}}
      </div>
    @endif
  </div>
</div>
<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('field_{{ $field_name }}_{{ $field_lang }}', {
      language: '{{Config::get('app.locale')}}',
      extraPlugins: 'imageuploader',
      skin: 'office2013',
      toolbar: 'runsite',
      filebrowserImageBrowseUrl: '{{asset('/runsite/laravel-filemanager?type=Images')}}',
            filebrowserBrowseUrl: '{{asset('/runsite/laravel-filemanager?type=Files')}}'

      @if(\App\Runsite\Field_settings::pull($settings, 'require_css_file'))
      contentsCss: '{{asset(\App\Runsite\Field_settings::pull($settings, 'require_css_file'))}}',
      @endif
    });
</script>
