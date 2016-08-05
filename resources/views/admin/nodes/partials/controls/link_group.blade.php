
@if(! ($ignore_language and $lang_key))

<?php
$linked_class = \App\Runsite\Field_settings::pull($settings, 'linked_class');
$parent_id = \App\Runsite\Field_settings::pull($settings, 'parent_id');
$variants = \App\Runsite\Classes::mapItems($linked_class, $parent_id);
$type_of_html_control = \App\Runsite\Field_settings::pull($settings, 'type_of_html_control');

$elements = explode(',', $field_value);

?>

<div class="form-group">
  <label for="field_{{ $field_name }}_{{ $field_lang }}" class="col-md-2 control-label"><div class="text-left">{{ $field_label }} <small class="text-muted">[{{$field_name}}]</small></div></label>
  <div class="col-md-10">
    @if($variants)
      @include('admin.nodes.partials.controls.partials.link_group.' . $type_of_html_control)
    @else
      <div class="alert alert-danger">
        <i class="fa fa-exclamation-circle"></i>
        {{trans('admin/nodes.can not get items of class')}}
      </div>
    @endif
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
