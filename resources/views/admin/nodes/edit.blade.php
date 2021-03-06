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

{!! Form::open(['route' => 'admin.nodes.update', 'class' => 'form-horizontal verification-form ctrl-s-auto-save', 'files' => true]) !!}

<input type="hidden" name="node_id" value="{{ $node->id }}">
<div class="p-md">
  @include('admin.nodes.partials.breadcrumb')

    <div class="edit-node-wrapper @if(\Input::get('class')) mini @endif">
      @include('admin.nodes.partials.languages_tabs')
      <div class="p b-a no-b-t bg-white m-b tab-content">
        @include('admin.nodes.partials.languages_contents')
        @include('admin.nodes.partials.form_controls')
      </div>
    </div>
</div>
{!! Form::close() !!}


@include('admin.nodes.partials.ctrl-s-auto-save')
@include('admin.nodes.children')
@stop
