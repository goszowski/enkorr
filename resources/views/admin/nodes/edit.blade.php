@extends('admin.app')
@section('content')
@include('admin.nodes.partials.items_nav')

@if(Session::has('success'))
  <script type="text/javascript">
    $(function(){
      Lobibox.notify('success', {
        position: 'top right',
        msg: '{{trans("admin/nodes.messages.".session("success"))}}',
        delay: 2500,
      });
    });
  </script>
@endif

{!! Form::open(['route' => 'admin.nodes.update', 'class' => 'form-horizontal verification-form', 'files' => true]) !!}

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
