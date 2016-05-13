@extends('admin.app')
@section('content')
@include('admin.languages.partials.items_nav')

<div class="p-md">
  <div class="panel panel-default">
    <div class="panel-heading bg-white">
      <i class="fa fa-bars"></i> {{trans('admin/languages.listing_items')}}
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="input-group">
            <input type="text" name="search" class="form-control input-sm" placeholder="{{trans('admin/languages.search')}}" value="{{\Input::get('search')}}">
            <div class="input-group-btn">
              <button type="submit" class="btn btn-dark btn-sm"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </div>
      </div>
    </div>
    @if(count($languages))
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>{{ trans('admin/languages.name') }}</th>
            <th>{{ trans('admin/languages.locale') }}</th>
            <th>{{ trans('admin/languages.is_active') }}</th>
            <th>{{ trans('admin/languages.is_default') }}</th>
            <th class="text-right">{{ trans('admin/languages.action') }}</th>
          </tr>
        </thead>
        <tbody>
          @foreach($languages as $lang)
            <tr>
              <td>{{ $lang->id }}</td>
              <td>{{ $lang->name }}</td>
              <td><span class="label bg-warning">{{ $lang->locale }}</span></td>
              <td>@if($lang->is_active) <i class="fa fa-check text-success"></i> @else <i class="fa fa-times text-muted"></i> @endif</td>
              <td>@if($lang->is_default) <i class="fa fa-check text-success"></i> @else <i class="fa fa-times text-muted"></i> @endif</td>
              <td class="text-right">
                <div class="btn-group">
                  <a href="{{route('admin.languages.edit', $lang->id)}}" class="btn btn-sm btn-default"><i class="fa fa-pencil-square-o"></i> {{trans('admin/languages.edit')}}</a>
                  <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="{{route('admin.languages.remove_confirmation', $lang->id)}}"><i class="fa fa-trash"></i> {{trans('admin/languages.remove')}}</a></li>
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
