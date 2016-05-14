@extends('admin.app')
@section('content')
@include('admin.nodes.partials.items_nav')

{!! Form::open(['route' => 'admin.nodes.store', 'class' => 'form-horizontal', 'files' => true]) !!}
<input type="hidden" name="class_id" value="{{$class->id}}">
<input type="hidden" name="parent_id" value="{{$parent->id}}">
<div class="p-md">

  <!-- languages tabs -->
  @include('admin.nodes.partials.languages_tabs')
  <!-- / languages tabs -->


  <div class="p b-a no-b-t bg-white m-b tab-content">

    @foreach($languages as $lg=>$lang)
    <div class="tab-pane @if(! $lg) active @endif" id="lang-tab-{{$lang->id}}">
      @include('admin.nodes.partials.groups_tabs')
      <div class="tab-content">
        <div class="tab-pane active" id="group-main-lang-{{$lang->id}}">

          @foreach($fields as $field)
            @if(! $field->group)
              @include('admin.nodes.partials.controls.'.$field->type->input_controller, [
                'field_name' => $field->shortname,
                'field_lang' => $lang->id,
                'field_label' => $field->name,
                'field_value' => NULL,
                'ignore_language' => $field->ignore_language,
                'lang_key' => $lg,
                'settings' => $field->settings,
                'hint' => $field->hint,
              ])
            @endif
          @endforeach

        </div>
        @foreach($groups as $rg=>$group)
        <div class="tab-pane" id="group-{{$group->id}}-lang-{{$lang->id}}">

          @foreach($fields as $field)
            @if($field->group and $field->group->id == $group->id)
              @include('admin.nodes.partials.controls.'.$field->type->input_controller, [
                'field_name' => $field->shortname,
                'field_lang' => $lang->id,
                'field_label' => $field->name,
                'field_value' => NULL,
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

    <!-- Form controls -->
    <div class="form-group">
      <div class="col-md-10 col-md-offset-2">
        <button type="submit" class="btn btn-dark"><i class="fa fa-check"></i> {{trans('admin/nodes.create')}}</button>
      </div>
    </div>
    <!-- / Form controls -->
  </div>



</div>
{!! Form::close() !!}
@stop
