@if(! ($ignore_language and $lang_key))
<div class="form-group">
  <label for="field_{{ $field_name }}_{{ $field_lang }}" class="col-md-2 control-label"><div class="text-left">{{ $field_label }} <small class="text-muted">[{{$field_name}}]</small></div></label>
  <div class="col-md-10 runsite-input-progress">
    <textarea maxlength="{{ \App\Runsite\Field_settings::pull($settings, 'db_field_size') }}" class="form-control" name="langs[{{$field_lang}}][{{$field_name}}]" id="field_{{ $field_name }}_{{ $field_lang }}">{{ $field_value }}</textarea>
    <div class="runsite-input-progress-bar"><div class="runsite-input-progress-bar-inner"></div></div>
    @if($hint)
      <div class="text-muted">
        <i class="fa fa-info" aria-hidden="true"></i> {{$hint}}
      </div>
    @endif
  </div>
</div>
@else
<input type="hidden" name="langs[{{$field_lang}}][{{$field_name}}]" value="">
@endif
