<?php
$locale = \App\Runsite\Libraries\Locale::getDefByNode((int) $value);
?>
@if($locale)
  <a data-toggle="tooltip" data-title="{{trans('admin/nodes.go_to_linked_section')}}" href="{{route('admin.nodes.edit', $value)}}">{{$locale->name}}</a>
@endif
