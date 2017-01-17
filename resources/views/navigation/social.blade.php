@if(count($items))
  <ul class="nav navbar-nav navbar-right">
    @foreach($items as $item)
      <li>
        <a href="{{lPath($item->link)}}" rel="nofollow" target="_blank">
          <i class="fa fa-{{str_slug($item->name)}}"></i>
        </a>
      </li>
    @endforeach
  </ul>

@endif
