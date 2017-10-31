
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

  @if($field_name == 'similar_publications' and !$field_value and $values[$lang->id]->tag_ids)
    <?php 
      $tags = explode(',', $values[$lang->id]->tag_ids);
      $similar = [];
      if(count($tags))
      {
        $similar = Model('publication');

        foreach($tags as $k=>$tag)
        {
          $method = !$k ? 'whereRaw' : 'orWhereRaw';
          $similar = $similar->{$method}("FIND_IN_SET('{$tag}', tag_ids) > 0");
        }

        $similar = $similar->orderby('pubdate', 'desc')->take(10)->get();
      }
    ?>

    @if(count($similar))
      @foreach($similar as $similarItem)
        <option selected value="{{ $similarItem->node_id }}">{{ $similarItem->name }}</option>
      @endforeach
    @endif
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
