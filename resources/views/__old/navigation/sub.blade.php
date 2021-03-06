@if(count($items))
  <ul class="dropdown-menu">
    @foreach($items as $item)
      <li @if(Menu::isCurrent($item->link)) class="active" @endif>
        <a href="{{lPath($item->link)}}" @if(config('runsite.ajax.enabled') and !Menu::hasChild($item->node_id)) data-link="{{$item->link}}" data-ajax="true" @endif>
          {{$item->name}}
        </a>

        {!! Menu::generate($item->node_id, 'sub') !!}
      </li>
    @endforeach
  </ul>
@endif
