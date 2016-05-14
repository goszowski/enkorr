@if($items)
  <ul>
    @foreach($items as $item)
    <?php
    $locale = \App\Runsite\Libraries\Locale::getDefByNode($item->id);
    ?>
    <li id="{{$item->id}}" class="@if(isset($item->children) and count($item->children)) jstree-open @elseif(\App\Runsite\Nodes::where('parent_id', $item->id)->whereIn('class_id', $classesToShow->lists('id'))->count()) jstree-closed @endif">
      <a href="{{route('admin.nodes.edit', $item->id)}}">@if($locale) {{str_limit($locale->name, 25)}} @else --- @endif</a>
      @if(isset($item->children) and count($item->children))
      <ul>
        @foreach($item->children as $child)
        <?php
        $locale = \App\Runsite\Libraries\Locale::getDefByNode($child->id);
        ?>
        <li id="{{$child->id}}" class="@if(\App\Runsite\Nodes::where('parent_id', $child->id)->whereIn('class_id', $classesToShow->lists('id'))->count()) jstree-closed @endif">
          <a href="{{route('admin.nodes.edit', $child->id)}}">@if($locale) {{$locale->name}}  @else --- @endif</a>
        </li>
        @endforeach
      </ul>
      @endif
    </li>
    @endforeach
  </ul>
@endif
