<div class="form-group sidebar">
  <h2 class="column-title">{{__('Публикации')}}</h2>
  <ul class="sidebar-list">
    @foreach ($popular_publications as $publication)
      <li>
        <a href="{{lPath($publication->node->absolute_path)}}" data-ajax="true" class="ripple" data-ripple-color="#eee">
          <span>
            <time datetime="/* publication datetime */">
              {{PH::formatDateTime($publication->pubdate, false, true)}}
            </time>
            {{$publication->name}}
          </span>
        </a>
      </li>
    @endforeach
  </ul>
</div>
<div class="form-group sidebar">
  <h2 class="column-title">{{__('Новости')}}</h2>
  <ul class="sidebar-list">
    @foreach ($latest_news as $new)
          <li>
              <a href="{{lPath($new->node->absolute_path)}}" data-ajax="true" class="ripple" data-ripple-color="#eee">
                  <span>
                      <time datetime="/* publication datetime */">
                            {{PH::formatDateTime($new->pubdate, false, true)}}
                          @if($new->pinned) <i class="fa fa-star text-primary xs-ml-5 animated animated-xs bounceIn"></i> @endif
                      </time>
                      {{$new->name}}
                  </span>
              </a>
          </li>
        @endforeach
  </ul>
</div>
