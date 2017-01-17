@if(count($items))
  <ul class="nav navbar-nav">
    @foreach($items as $item)
      <li class="@if(Menu::isCurrent($item->link)) active @endif @if(Menu::hasChild($item->node_id)) dropdown @endif">
        <a href="{{lPath($item->link)}}" @if(config('runsite.ajax.enabled') and !Menu::hasChild($item->node_id)) data-link="{{$item->link}}" data-ajax="true" @endif @if(Menu::hasChild($item->node_id)) class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" @endif>
          {{$item->name}}
          @if(Menu::hasChild($item->node_id)) <span class="caret"></span> @endif
        </a>

        {!! Menu::generate($item->node_id, 'sub') !!}
      </li>
    @endforeach

  </ul>

@endif
