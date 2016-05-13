<label class="col-md-2 control-label"><div class="text-left">&nbsp;</div></label>
<div class="col-md-10">
  <div class="checkbox">
    <label class="ui-checks">
      <input type="hidden" name="langs[{{$field_lang}}][{{$field_name}}]" value="0">
      <input type="checkbox" name="langs[{{$field_lang}}][{{$field_name}}]" value="1" @if($field_value) checked @endif >
      <i></i>
      {{$field_label}}
      <small class="text-muted">[{{$field_name}}]</small>
    </label>
  </div>
</div>
