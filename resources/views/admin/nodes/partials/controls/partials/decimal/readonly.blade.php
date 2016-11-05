<div class="form-group">
  <label class="col-md-2 control-label" style="padding-top: 0;"><div class="text-left">{{ $field_label }} <small class="text-muted">[{{$field_name}}]</small></div></label>
  <div class="col-md-10">
    <input type="hidden" name="langs[{{$field_lang}}][{{$field_name}}]" value="{{ $field_value }}">
    {{ $field_value }}

    @if($hint)
      <div class="text-muted">
        <i class="fa fa-info" aria-hidden="true"></i> {{$hint}}
      </div>
    @endif
  </div>
</div>
