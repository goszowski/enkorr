@if($value)
  <?php
    $elements = explode(',', $value);
    foreach($elements as $element) {
      $_elements[] = \App\Runsite\Libraries\Locale::getDefByNode((int) $element);
    }
  ?>
  @foreach($_elements as $k=>$element)
    <a class="label bg-warning" data-toggle="tooltip" data-title="{{trans('admin/nodes.go_to_linked_section')}}" href="{{route('admin.nodes.edit', $element['node_id'])}}">{{$element['name']}}</a>
  @endforeach
@endif
