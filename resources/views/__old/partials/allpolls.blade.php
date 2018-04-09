<div class="form-group sidebar">
  <h2 class="column-title">{{__('Опросы')}}</h2>
  <ul class="sidebar-list">
    @foreach ($polls as $poll)
      <li>
        <a href="{{lPath($poll->node->absolute_path)}}" data-ajax="true" class="ripple" data-ripple-color="#eee">
          <span>
            {{$poll->name}}
          </span>
        </a>
      </li>
    @endforeach
  </ul>
</div>
