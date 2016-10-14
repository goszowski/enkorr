@if($filter == $field->shortname and $filter_value)
  @php($value = \App\Runsite\Nodes::highlightkeyword($value, $filter_value))
@endif

@if($field->shortname == 'name')
  @if($value)
    <a href="/panel-admin/nodes/edit/{{$child->node_id}}">{!!$value!!}</a>
  @else
    <a href="/panel-admin/nodes/edit/{{$child->node_id}}">Edit</a>
  @endif
@else
  {{$value}}
@endif
