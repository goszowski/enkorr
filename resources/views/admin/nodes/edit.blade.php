@extends('admin.app')
@section('content')
@include('admin.nodes.partials.items_nav')



{!! Form::open(['route' => 'admin.nodes.update', 'class' => 'form-horizontal', 'files' => true]) !!}

<input type="hidden" name="node_id" value="{{ $node->id }}">
<div class="p-md">
  @include('admin.nodes.partials.breadcrumb')
  <!-- languages tabs -->
  @include('admin.nodes.partials.languages_tabs')
  <!-- / languages tabs -->
  <div class="p b-a no-b-t bg-white m-b tab-content">
    <!-- languages contents -->
    @include('admin.nodes.partials.languages_contents')
    <!-- / languages contents -->
    <!-- Form controls -->
    @include('admin.nodes.partials.form_controls')
    <!-- / Form controls -->
  </div>
</div>
{!! Form::close() !!}

@include('admin.nodes.children')
@stop
