@extends('admin.app')

@section('content')

  <div class="p-md">
    <div class="panel panel-default">
      <div class="panel-heading bg-white">
        <i class="{{$message->icon ?: 'fa fa-flag'}} text-{{$message->icon_color ?: 'primary'}}"></i>
      </div>

      <div class="panel-body">
        {{$message->message}}

        @if($message->node_id)
          <br><br>
          <a href="{{url('panel-admin/nodes/edit/'.$message->node_id)}}"><b>{{trans('admin/notify.Перейти до привязаного розділу')}}</b></a>
        @endif
      </div>
    </div>
  </div>

@endsection
