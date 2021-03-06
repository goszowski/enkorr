<label class="col-md-2 control-label"><div class="text-left">{{$field_label}} <small class="text-muted">[{{$field_name}}]</small></div></label>
<div class="col-md-10">
  <label class="ui-switch ui-switch-md bg-primary m-t-xs m-r">
    <input type="hidden" name="langs[{{$field_lang}}][{{$field_name}}]" value="0">
    <input type="checkbox" name="langs[{{$field_lang}}][{{$field_name}}]" value="1" @if($field_value) checked @endif >
    <i></i>
  </label>

  @if($hint)
      <div class="text-muted">
        <i class="fa fa-info" aria-hidden="true"></i> {{$hint}}
      </div>
    @endif
</div>
