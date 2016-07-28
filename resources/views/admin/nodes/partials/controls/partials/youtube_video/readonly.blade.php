<div class="form-group">
  <label for="field_{{ $field_name }}_{{ $field_lang }}" class="col-md-2 control-label"><div class="text-left">{{ $field_label }} <small class="text-muted">[{{$field_name}}]</small></div></label>
  <div class="col-md-10 ">

    <div class="thumbnail" style="width: 210px; margin-bottom: 5px;">
      <a href="https://www.youtube.com/watch?v={{$field_value}}" target="_blank" class="youtube-link">
        @if($field_value)
          <img class="youtube-img" src="https://i.ytimg.com/vi/{{$field_value}}/mqdefault.jpg">
        @else
          <img class="youtube-img" src="{{asset('admin/youtube_placeholder.jpg')}}">
        @endif
      </a>
      <input type="hidden" name="langs[{{$field_lang}}][{{$field_name}}]" value="{{ $field_value }}">
    </div>
    @if($hint)
      <div class="text-muted">
        <i class="fa fa-info" aria-hidden="true"></i> {{$hint}}
      </div>
    @endif

  </div>
</div>
