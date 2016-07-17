@if(count($groups))
<ul class="nav nav-xs nav-pills m-b group-tabs">
  <li @if(! Session::has('active_group') or session('active_group') == 0) class="active" @endif ><a data-group="0" data-toggle="tab" data-info="group-0-lang-{{$lang->id}}" href="#group-main-lang-{{$lang->id}}">{{trans('admin/nodes.main')}} <span data-count="0" class="label bg-warning"></span></a></li>
  @foreach($groups as $rg=>$group)
  <li @if(Session::has('active_group') and session('active_group') == $group->id) class="active" @endif><a data-group="{{$group->id}}" data-toggle="tab" data-info="group-{{$group->id}}-lang-{{$lang->id}}" href="#group-{{$group->id}}-lang-{{$lang->id}}">{{$group->name}} <span data-count="0" class="label bg-warning"></span></a></li>
  @endforeach
</ul>
@endif

<input type="hidden" name="active_group_id" @if(Session::has('active_group')) value="{{session('active_group')}}" @else value="0" @endif>
