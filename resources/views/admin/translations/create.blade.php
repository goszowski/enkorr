@extends('admin.app')
@section('content')
{{-- @include('admin.languages.partials.items_nav') --}}

{{-- <div class="p-md">
  <div class="panel panel-default">
    <div class="panel-heading bg-white">
      <i class="fa fa-bars"></i> Translations
    </div>
    <div class="panel-body">
      {!! Form::open(['url'=>url('/panel-admin/translations'), 'method'=>'post']) !!}
        @include('admin.translations.form')
        <button type="submit" class="btn btn-success">Create</button>
      {!! Form::close() !!}
    </div>
  </div>
</div> --}}
@stop
