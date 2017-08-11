@extends('admin.app')
@section('content')
{{-- @include('admin.languages.partials.items_nav') --}}

<div class="p-md">
  <div class="panel panel-default">
    <div class="panel-heading bg-white">
      <i class="fa fa-bars"></i> Translations
    </div>
    <div class="panel-body">
      {!! Form::open(['url'=>LaravelLocalization::getLocalizedUrl(null, url('/panel-admin/translations/'.$translations[0]->key)), 'method'=>'patch']) !!}
        @include('admin.translations.form')
        <button type="submit" class="btn btn-success">Update</button>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@stop
