
@foreach($languages as $lg=>$lang)
<div class="tab-pane @if(! $lg) active @endif" id="lang-tab-{{$lang->id}}">
  @include('admin.nodes.partials.groups_tabs')
  <div class="tab-content">
    <div class="tab-pane @if(! Session::has('active_group') or session('active_group') == 0) active @endif" id="group-main-lang-{{$lang->id}}">

      <div class="form-group">
        <label class="col-md-2 control-label" style="padding-top: 0;"><div class="text-left text-xs">{{trans('admin/nodes.absolute_path')}}:</div></label>
        <div class="col-md-10 text-xs">
          {{$node->absolute_path}}
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
