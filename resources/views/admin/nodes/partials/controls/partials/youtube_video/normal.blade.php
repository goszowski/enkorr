<div class="form-group">
  <label for="field_{{ $field_name }}_{{ $field_lang }}" class="col-md-2 control-label"><div class="text-left">{{ $field_label }} <small class="text-muted">[{{$field_name}}]</small></div></label>
  <div class="col-md-10 ">

    <div class="thumbnail" style="width: 210px; margin-bottom: 5px;">
      <a href="https://www.youtube.com/watch?v={{$field_value}}" target="_blank">
        @if($field_value)
          <img src="https://i.ytimg.com/vi/{{$field_value}}/mqdefault.jpg">
        @else
          <img src="{{asset('admin/youtube_placeholder.jpg')}}">
        @endif
      </a>
      <div class="caption runsite-input-progress text-center">
        <input maxlength="{{ \App\Runsite\Field_settings::pull($settings, 'db_field_size') }}" class="form-control text-center {{($field->required) ? 'required' : ''}}" data-lang="{{$field_lang}}" data-group="{{$field->group_id}}" type="text" name="langs[{{$field_lang}}][{{$field_name}}]" id="field_{{ $field_name }}_{{ $field_lang }}" value="{{ $field_value }}" >
        <div class="runsite-input-progress-bar"><div class="runsite-input-progress-bar-inner"></div></div>
      </div>
    </div>
    @if($hint)
      <div class="text-muted">
        <i class="fa fa-info" aria-hidden="true"></i> {{$hint}}
      </div>
    @endif

  </div>
</div>
