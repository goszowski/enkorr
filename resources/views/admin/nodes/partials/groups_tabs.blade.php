@if(count($groups))
<ul class="nav nav-xs nav-pills m-b">
  <li class="active"><a data-toggle="tab" href="#group-main-lang-{{$lang->id}}">{{trans('admin/nodes.main')}}</a></li>
  @foreach($groups as $rg=>$group)
  <li><a data-toggle="tab" href="#group-{{$group->id}}-lang-{{$lang->id}}">{{$group->name}}</a></li>
  @endforeach
</ul>
@endif
