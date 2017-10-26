


<div class="pull-right">
  <div class="btn-group">

    @if((isset($dependencies) and count($dependencies)) or (isset($NodeDependencies) and count($NodeDependencies)))
      <div class="btn-group" role="group">
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-plus"></i> {{trans('admin/nodes.create')}}
          <span class="caret"></span>
        </button>
        <ul class="dropdown-menu dropdown-menu-right">
          @foreach($NodeDependencies as $item)
            @if(\Auth::user()->is_limited)
              @if($item->classes->limited_users_can_create)
                <li><a href="{{route('admin.nodes.create', [$item->classes->id, $node->id])}}">{{$item->classes->name_create}}</a></li>
              @endif
            @else
              <li><a href="{{route('admin.nodes.create', [$item->classes->id, $node->id])}}">{{$item->classes->name_create}}</a></li>
            @endif
          @endforeach
          @foreach($dependencies as $item)
            @if(\Auth::user()->is_limited)
              @if($item->classes->limited_users_can_create)
                <li><a href="{{route('admin.nodes.create', [$item->classes->id, $node->id])}}">{{$item->classes->name_create}}</a></li>
              @endif
            @else
              <li><a href="{{route('admin.nodes.create', [$item->classes->id, $node->id])}}">{{$item->classes->name_create}}</a></li>
            @endif
          @endforeach
        </ul>
      </div>
    @endif


    @if(isset($node) and !isset($parent))
      <a href="{{route('admin.nodes.settings', $node->id)}}" class="btn btn-default" title="{{trans('admin/nodes.settings')}}"><i class="fa fa-cog"></i></a>
      @if(!Auth::user()->is_limited)
        <a href="{{route('admin.nodes.dependencies', $node->id)}}" class="btn btn-default" title="{{trans('admin/nodes.dependencies')}}"><i class="fa fa-sitemap"></i></a>
      @endif
    @endif


  </div>
</div>



@foreach($languages as $lg=>$lang)
<div class="tab-pane @if((! Session::has('active_lang') and $lang->locale == LaravelLocalization::getCurrentLocale()) or (Session::has('active_lang') and session('active_lang') == $lang->id)) active @endif" id="lang-tab-{{$lang->id}}">
  @include('admin.nodes.partials.groups_tabs')
  <div class="tab-content">
    <div class="tab-pane @if(! Session::has('active_group') or session('active_group') == 0) active @endif" id="group-main-lang-{{$lang->id}}">

      <div class="form-group">
        <label class="col-md-2 control-label" style="padding-top: 0;"><div class="text-left text-xs">{{trans('admin/nodes.absolute_path')}}:</div></label>
        <div class="col-md-10 text-xs">
          {{$node->absolute_path}}
          <a href="{{ lPath($node->absolute_path) }}?preview=true" target="_blank" class="btn btn-default btn-xs">Предпросмотр</a>
        </div>
      </div>


      @foreach($node->_class->_fields as $field)
        @if(! $field->group)
          @include('admin.nodes.partials.controls.'.$field->type->input_controller, [
            'field_name' => $field->shortname,
            'field_lang' => $lang->id,
            'field_label' => $field->name,
            'field_value' => isset($values[$lang->id]) ? $values[$lang->id]->{$field->shortname} : NULL,
            'ignore_language' => $field->ignore_language,
            'lang_key' => $lg,
            'settings' => $field->settings,
            'hint' => $field->hint,
          ])
        @endif
      @endforeach

    </div>
    @foreach($groups as $rg=>$group)
    <div class="tab-pane @if(Session::has('active_group') and session('active_group') == $group->id) active @endif" id="group-{{$group->id}}-lang-{{$lang->id}}">

      @foreach($node->_class->_fields as $field)
        @if($field->group and $field->group->id == $group->id)
          @include('admin.nodes.partials.controls.'.$field->type->input_controller, [
            'field_name' => $field->shortname,
            'field_lang' => $lang->id,
            'field_label' => $field->name,
            'field_value' => isset($values[$lang->id]) ? $values[$lang->id]->{$field->shortname} : NULL,
            'ignore_language' => $field->ignore_language,
            'lang_key' => $lg,
            'settings' => $field->settings,
            'hint' => $field->hint,
          ])
        @endif
      @endforeach

    </div>
    @endforeach
  </div>
</div>
@endforeach
