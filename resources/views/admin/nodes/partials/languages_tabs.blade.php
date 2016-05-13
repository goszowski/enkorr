<ul class="nav nav-sm nav-tabs">
  @foreach($languages as $lk=>$lang)
    <li role="presentation" class="@if(!$lk) active @endif">
      <a data-toggle="tab" href="#lang-tab-{{$lang->id}}">{{$lang->name}}</a>
    </li>
  @endforeach
</ul>
