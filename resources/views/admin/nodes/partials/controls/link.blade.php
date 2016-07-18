
@if(! ($ignore_language and $lang_key))

<?php
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

$variants = \App\Runsite\Classes::mapItems($linked_class, $parent_id);
$type_of_html_control = \App\Runsite\Field_settings::pull($settings, 'type_of_html_control');
?>

<div class="form-group">
  <label for="field_{{ $field_name }}_{{ $field_lang }}" class="col-md-2 control-label"><div class="text-left">{{ $field_label }} <small class="text-muted">[{{$field_name}}]</small></div></label>
  <div class="col-md-10">
    @if($variants)
      @include('admin.nodes.partials.controls.partials.link.' . $type_of_html_control)
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
@endif
