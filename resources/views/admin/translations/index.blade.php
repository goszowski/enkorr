@extends('admin.app')
@section('content')
{{-- @include('admin.languages.partials.items_nav') --}}

<div class="p-md">
  <div class="panel panel-default">
    <div class="panel-heading bg-white">
      <i class="fa fa-bars"></i> Translations
    </div>
    <div class="panel-body">
      <div class="row">
        {{-- <a class="btn btn-success btn-sm" href="{{url('/panel-admin/translations/create')}}"><i class="fa fa-plus"></i> Create</a> --}}
        <div class="col-xs-12 col-sm-6 col-md-3">
          {!! Form::open(['route'=>'admin.translations.index', 'method'=>'get']) !!}
          <div class="input-group">
            <input type="text" name="search" class="form-control input-sm" placeholder="{{trans('admin/languages.search')}}" value="{{\Input::get('search')}}">
            <div class="input-group-btn">
              <button type="submit" class="btn btn-dark btn-sm"><i class="fa fa-search"></i></button>
            </div>
          </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
    @if(count($translations))
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>{{ trans('admin/languages.name') }}</th>
            <th class="text-right">{{ trans('admin/languages.action') }}</th>
          </tr>
        </thead>
        <tbody>
          @foreach($translations as $trans)
            <tr>
              <td>{{ $trans->id }}</td>
              <td>
                <a href="{{route('admin.translations.edit', $trans->key)}}" >{{ $trans->key }}</a><br>
                @foreach($trans->variants() as $variant)
                  <span class="label label-default">{{$variant->_value}}</span>
                @endforeach
              </td>

              <td class="text-right">
                {!! Form::open(['url'=>url('panel-admin/translations/'.$trans->key), 'method'=>'delete']) !!}
                <button type="submit" class="btn btn-danger btn-sm" onclick="if(!confirm('Are you sure?')) return false;">
                  <i class="fa fa-trash"></i>
                </button>
                {!! Form::close() !!}
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="panel-body">
        {!! $translations->render() !!}
      </div>
    @endif

  </div>
</div>
@stop
