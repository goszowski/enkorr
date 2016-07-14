@extends('admin.app')
@section('content')

@include('admin.classes.partials.edit_nav')

<div class="p-md">
  @include('admin.fields.partials.class_info')
  <div class="panel panel-default">
    <div class="panel-heading bg-white">
      <i class="fa fa-bars"></i> {{trans('admin/fields.listing_items')}} <small class="text-muted">({{$class->name}})</small>
    </div>
    <div class="panel-body">
      <a href="{{route('admin.fields.create', $class->id)}}" class="btn btn-sm btn-addon btn-success">
        <i class="fa fa-plus fa-fw"></i>
        {{trans('admin/fields.create_field')}}
      </a>
      <div class="btn-group">
        <button type="button" class="btn btn-warning dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{trans('admin/fields.from_template')}} <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">

          {!! Form::open(array('route' => ['admin.fields.store', $class->id], 'class' => 'hidden create_name')) !!}
            <input type="hidden" name="class_id" value="{{$class->id}}">
            <input type="hidden" name="type_id" value="1">
            <input type="hidden" name="group_id" value="">
            <input type="hidden" name="name" value="{{trans('admin/fields.template.name')}}">
            <input type="hidden" name="hint" value="">
            <input type="hidden" name="shortname" value="name">
            <input type="hidden" name="required" value="on">
            <input type="hidden" name="shown" value="on">
          {!! Form::close() !!}
          <li><a href="#" onclick="$(this).parent().parent().find('.create_name').submit(); return false;">Name <small class="text-muted">[string]</small></a></li>

          {!! Form::open(array('route' => ['admin.fields.store', $class->id], 'class' => 'hidden create_is_active')) !!}
            <input type="hidden" name="class_id" value="{{$class->id}}">
            <input type="hidden" name="type_id" value="7">
            <input type="hidden" name="group_id" value="">
            <input type="hidden" name="name" value="{{trans('admin/fields.template.is_active')}}">
            <input type="hidden" name="hint" value="">
            <input type="hidden" name="shortname" value="is_active">
            <input type="hidden" name="shown" value="on">
            <input type="hidden" name="ignore_language" value="on">
          {!! Form::close() !!}
          <li><a href="#" onclick="$(this).parent().parent().find('.create_is_active').submit(); return false;">Is Active <small class="text-muted">[boolean]</small></a></li>

          <li role="separator" class="divider"></li>

          {!! Form::open(array('route' => ['admin.fields.store', $class->id], 'class' => 'hidden create_seo_title')) !!}
            <input type="hidden" name="class_id" value="{{$class->id}}">
            <input type="hidden" name="type_id" value="1">
            <input type="hidden" name="group_id" value="">
            <input type="hidden" name="name" value="{{trans('admin/fields.template.seo_title')}}">
            <input type="hidden" name="hint" value="">
            <input type="hidden" name="shortname" value="title">
          {!! Form::close() !!}
          <li><a href="#" onclick="$(this).parent().parent().find('.create_seo_title').submit(); return false;">SEO Title <small class="text-muted">[string]</small></a></li>

          {!! Form::open(array('route' => ['admin.fields.store', $class->id], 'class' => 'hidden create_seo_keywords')) !!}
            <input type="hidden" name="class_id" value="{{$class->id}}">
            <input type="hidden" name="type_id" value="1">
            <input type="hidden" name="group_id" value="">
            <input type="hidden" name="name" value="{{trans('admin/fields.template.seo_keywords')}}">
            <input type="hidden" name="hint" value="">
            <input type="hidden" name="shortname" value="keywords">
          {!! Form::close() !!}
          <li><a href="#" onclick="$(this).parent().parent().find('.create_seo_keywords').submit(); return false;">SEO Keywords <small class="text-muted">[string]</small></a></li>

          {!! Form::open(array('route' => ['admin.fields.store', $class->id], 'class' => 'hidden create_seo_description')) !!}
            <input type="hidden" name="class_id" value="{{$class->id}}">
            <input type="hidden" name="type_id" value="3">
            <input type="hidden" name="group_id" value="">
            <input type="hidden" name="name" value="{{trans('admin/fields.template.seo_description')}}">
            <input type="hidden" name="hint" value="">
            <input type="hidden" name="shortname" value="description">
          {!! Form::close() !!}
          <li><a href="#" onclick="$(this).parent().parent().find('.create_seo_description').submit(); return false;">SEO Description <small class="text-muted">[textarea]</small></a></li>

          <li role="separator" class="divider"></li>

          {!! Form::open(array('route' => ['admin.fields.store', $class->id], 'class' => 'hidden create_image')) !!}
            <input type="hidden" name="class_id" value="{{$class->id}}">
            <input type="hidden" name="type_id" value="6">
            <input type="hidden" name="group_id" value="">
            <input type="hidden" name="name" value="{{trans('admin/fields.template.image')}}">
            <input type="hidden" name="hint" value="">
            <input type="hidden" name="shortname" value="image">
          {!! Form::close() !!}
          <li><a href="#" onclick="$(this).parent().parent().find('.create_image').submit(); return false;">Image <small class="text-muted">[image]</small></a></li>

          <li role="separator" class="divider"></li>

          {!! Form::open(array('route' => ['admin.fields.store', $class->id], 'class' => 'hidden create_pubdate')) !!}
            <input type="hidden" name="class_id" value="{{$class->id}}">
            <input type="hidden" name="type_id" value="8">
            <input type="hidden" name="group_id" value="">
            <input type="hidden" name="name" value="{{trans('admin/fields.template.pubdate')}}">
            <input type="hidden" name="hint" value="">
            <input type="hidden" name="shortname" value="pubdate">
          {!! Form::close() !!}
          <li><a href="#" onclick="$(this).parent().parent().find('.create_pubdate').submit(); return false;">Pubdate <small class="text-muted">[datetime]</small></a></li>
        </ul>
      </div>
    </div>
    @if(count($fields))
      <table class="table table-striped table-hover table-condensed">
        <thead>
          <tr>
            <th>#</th>
            <th>{{trans('admin/fields.name')}}</th>
            <th>{{trans('admin/fields.shortname')}}</th>
            <th>{{trans('admin/fields.type')}}</th>
            <th>{{trans('admin/fields.group')}}</th>
            <th class="text-center">{{trans('admin/fields.required')}}</th>
            <th class="text-center">{{trans('admin/fields.shown')}}</th>
            <th class="text-center">{{trans('admin/fields.order')}}</th>
            <th class="text-center">{{trans('admin/fields.settings')}}</th>
            <th class="text-right">{{trans('admin/fields.action')}}</th>
          </tr>
        </thead>
        <tbody>
          @foreach($fields as $k=>$field)
          <tr>
            <td>{{$field->id}}</td>
            <td>{{$field->name}}</td>
            <td>{{$field->shortname}}</td>
            <td><span class="label bg-warning">{{$field->type->name}}</span></td>
            <td>@if(isset($field->group))<span class="label bg-success">{{$field->group->name}}</span>@endif</td>
            <td class="text-center"><i class="fa @if($field->required) fa-check text-success @else fa-times text-muted @endif"></i></td>
            <td class="text-center"><i class="fa @if($field->shown) fa-check text-success @else fa-times text-muted @endif"></i></td>
            <td class="text-center">
              <div class="btn-group" role="group">
                <a href="{{route('admin.fields.moveup', ['class_id'=>$class->id, 'field_id'=>$field->id])}}" class="btn btn-sm btn-default" @if($k < 1) disabled @endif><i class="fa fa-chevron-up"></i></a>
                <a href="{{route('admin.fields.movedown', ['class_id'=>$class->id, 'field_id'=>$field->id])}}" class="btn btn-sm btn-default" @if(++$k == count($fields)) disabled @endif><i class="fa fa-chevron-down"></i></a>
              </div>
            </td>
            <td class="text-center">
              <a href="{{route('admin.fields.settings', ['class_id'=>$class->id, 'field_id'=>$field->id])}}" class="btn btn-warning btn-sm"><i class="fa fa-cog"></i> Settings</a>
            </td>
            <td class="text-right">
              <div class="btn-group">
                <a href="{{route('admin.fields.edit', ['class_id'=>$class->id, 'field_id'=>$field->id])}}" class="btn btn-sm btn-primary"><i class="fa fa-pencil-square-o"></i> {{trans('admin/fields.edit')}}</a>
                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li><a href="{{route('admin.fields.settings', ['class_id'=>$class->id, 'field_id'=>$field->id])}}"><i class="fa fa-cog"></i> Settings</a></li>
                  <li><a href="{{route('admin.fields.remove_confirmation', ['class_id'=>$class->id, 'field_id'=>$field->id])}}"><i class="fa fa-trash"></i> {{trans('admin/fields.remove')}}</a></li>
                </ul>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
    </table>
    @endif
  </div>
</div>
@stop
