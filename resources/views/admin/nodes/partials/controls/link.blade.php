
@if(! ($ignore_language and $lang_key))

<?php
$type_of_html_control = \App\Runsite\Field_settings::pull($settings, 'type_of_html_control');
$linked_class = \App\Runsite\Field_settings::pull($settings, 'linked_class');
$parent_id = \App\Runsite\Field_settings::pull($settings, 'parent_id');
if($parent_id == 'near') {
  if(isset($parent)) {
    $parent_id = $parent->id;
  }
  elseif(isset($node)) {
    $parent_id = $node->parent_id;
  }

}

if($type_of_html_control != 'autocomplite') {
  $variants = \App\Runsite\Classes::mapItems($linked_class, $parent_id);
}


?>

<div class="form-group">
  <label for="field_{{ $field_name }}_{{ $field_lang }}" class="col-md-2 control-label"><div class="text-left">{{ $field_label }} <small class="text-muted">[{{$field_name}}]</small></div></label>
  <div class="col-md-10">
    @include('admin.nodes.partials.controls.partials.link.' . $type_of_html_control)
    @if($hint)
      <div class="text-muted">
        <i class="fa fa-info" aria-hidden="true"></i> {{$hint}}
      </div>
    @endif
  </div>
</div>
@endif
