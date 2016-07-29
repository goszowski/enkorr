@extends('admin.app')
@section('content')
<div class="p-md">
  <div class="panel panel-default">
    <div class="panel-heading bg-white">
      <i class="fa fa-bars"></i> {{trans('admin/classes.listing_items')}}
    </div>
    <div class="panel-body">
      {!! Form::open(array('route' => 'admin.classes.items', 'method'=>'get')) !!}
      <div class="row">
        <a class="btn btn-success btn-sm" href="{{route('admin.classes.create')}}"><i class="fa fa-plus"></i> {{trans('admin/classes.create')}}</a>
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="input-group">
            <input type="text" name="search" class="form-control input-sm" placeholder="{{trans('admin/classes.search')}}" value="{{\Input::get('search')}}">
            <div class="input-group-btn">
              <button type="submit" class="btn btn-dark btn-sm"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </div>
      </div>
      {!! Form::close() !!}

    </div>
      @if(count($classes))
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>{{trans('admin/classes.name')}}</th>
              <th>{{trans('admin/classes.shortname')}}</th>
              <th>{{trans('admin/classes.default_controller')}}</th>
              <th class="text-right">{{trans('admin/classes.action')}}</th>
            </tr>
          </thead>
          <tbody>
            @foreach($classes as $class)
            <tr>
              <td>{{$class->id}}</td>
              <td><a href="{{route('admin.classes.edit', $class->id)}}" data-toggle="tooltip" data-title="{{trans('admin/classes.edit')}}" data-delay="600"><i class="fa fa-bars"></i> {{$class->name}}</a></td>
              <td><span class="label bg-success">{{$class->shortname}}</span></td>
              <td><span class="label bg-warning">{{$class->default_controller}}</span></td>
              <td class="text-right">
                <div class="btn-group">
                  <a href="{{route('admin.classes.edit', $class->id)}}" class="btn btn-sm btn-default"><i class="fa fa-pencil-square-o"></i> {{trans('admin/classes.edit')}}</a>
                  <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="{{route('admin.classes.remove_confirmation', $class->id)}}"><i class="fa fa-trash"></i> {{trans('admin/classes.remove')}}</a></li>
                  </ul>
                </div>

              </td>
            </tr>
            @endforeach
          </tbody>
      </table>
      @endif
  </div>
  @if(count($classes))
    {!! $classes->render() !!}
  @endif
</div>

@stop
