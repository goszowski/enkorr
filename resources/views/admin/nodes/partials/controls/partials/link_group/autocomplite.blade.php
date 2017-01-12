
<input type="hidden" name="langs[{{$field_lang}}][{{$field_name}}][]" value="">
<select multiple  class="select2-autocomplete-group" data-linked-class="{{$linked_class}}"  data-parent-id="{{$parent_id}}" data-live-search="true" name="langs[{{$field_lang}}][{{$field_name}}][]" style="width: 400px;" >
  @if($field_value)
    @foreach(explode(',', $field_value) as $item)
      @if($item)
        @php($name = @\App\Runsite\Libraries\Node::getU($linked_class)->where('node_id', $item)->first()->name)
        <option selected value="{{$item}}">{{$name}}</option>
      @endif
    @endforeach
  @endif
</select>

@if($field_value)
  <br>
  {{trans('admin/nodes.go_to_linked_sections')}}:<br>
  @foreach(explode(',', $field_value) as $k=>$item)
    @if($item)
      @php($name = @\App\Runsite\Libraries\Node::getU($linked_class)->where('node_id', $item)->first()->name)
      <a href="{{route('admin.nodes.edit', $item)}}">{{$name}}</a>
      @if(++$k < count(explode(',', $field_value))), @endif
    @endif
  @endforeach

@endif
