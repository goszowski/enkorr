@if(count($groups))
<ul class="nav nav-xs nav-pills m-b group-tabs">
  <li class="active"><a data-toggle="tab" data-info="group-0-lang-{{$lang->id}}" href="#group-main-lang-{{$lang->id}}">{{trans('admin/nodes.main')}} <span data-count="0" class="label bg-warning"></span></a></li>
  @foreach($groups as $rg=>$group)
  <li><a data-toggle="tab" data-info="group-{{$group->id}}-lang-{{$lang->id}}" href="#group-{{$group->id}}-lang-{{$lang->id}}">{{$group->name}} <span data-count="0" class="label bg-warning"></span></a></li>
  @endforeach
</ul>
@endif
