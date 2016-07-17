@if($field->shortname == 'name')
  <a href="/panel-admin/nodes/edit/{{$child->node_id}}">{{$value}}</a>
@else
  {{$value}}
@endif
