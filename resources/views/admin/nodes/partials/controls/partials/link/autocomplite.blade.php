<?php
if($field_value)
{
  $name = @\App\Runsite\Libraries\Node::getU($linked_class)->where('node_id', $field_value)->first()->name;
}
?>

<select class="select2-autocomplete" data-linked-class="{{$linked_class}}"  data-parent-id="{{$parent_id}}" data-live-search="true" name="langs[{{$field_lang}}][{{$field_name}}]" style="width: 400px;" >
  @if($field_value)
    <option value="{{$field_value}}">{{$name}}</option>
  @endif
</select>

@if($field_value)
  <br>
  {{trans('admin/nodes.go_to_linked_section')}}: <a href="{{route('admin.nodes.edit', $field_value)}}">{{$name}}</a>
@endif
