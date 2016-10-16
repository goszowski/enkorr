@extends('admin.app')

@section('content')
  {{-- @include('admin.users._nav') --}}

  <div class="p-md">
    <div class="panel panel-default">
      <div class="panel-heading bg-white">
        <i class="fa fa-bars"></i> {{trans('admin/users.create')}}
      </div>

      <div class="panel-body">



        {!! Form::open(['url' => 'panel-admin/notify/' . $message->id, 'class' => 'form-horizontal', 'method'=>'PATCH']) !!}

        <div class="form-group {{ $errors->has('message') ? 'has-error' : ''}}">
          {!! Form::label('message', 'Message: ', ['class' => 'col-sm-3 control-label']) !!}
          <div class="col-sm-6">
            <div class="form-group">
              {!! Form::textarea('message', $message->message, ['class' => 'form-control']) !!}
            </div>
            {!! $errors->first('message', '<p class="help-block">:message</p>') !!}
          </div>
        </div>

        <div class="form-group {{ $errors->has('icon') ? 'has-error' : ''}}">
          {!! Form::label('icon', 'Icon: ', ['class' => 'col-sm-3 control-label']) !!}
          <div class="col-sm-6">
            <div class="form-group">
              {!! Form::text('icon', $message->icon, ['class' => 'form-control']) !!}
            </div>
            {!! $errors->first('message', '<p class="help-block">:icon</p>') !!}
          </div>
        </div>

        <div class="form-group {{ $errors->has('icon_color') ? 'has-error' : ''}}">
          {!! Form::label('icon_color', 'Icon color: ', ['class' => 'col-sm-3 control-label']) !!}
          <div class="col-sm-6">
            <div class="form-group">
              {!! Form::text('icon_color', $message->icon_color, ['class' => 'form-control']) !!}
            </div>
            {!! $errors->first('message', '<p class="help-block">:icon_color</p>') !!}
          </div>
        </div>

        <div class="form-group {{ $errors->has('node_id') ? 'has-error' : ''}}">
          {!! Form::label('node_id', 'Node id: ', ['class' => 'col-sm-3 control-label']) !!}
          <div class="col-sm-6">
            <div class="form-group">
              {!! Form::text('node_id', $message->node_id, ['class' => 'form-control']) !!}
            </div>
            {!! $errors->first('message', '<p class="help-block">:node_id</p>') !!}
          </div>
        </div>


        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-3">
                {!! Form::submit('Update', ['class' => 'btn btn-primary ']) !!}
            </div>
        </div>
        {!! Form::close() !!}

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
      </div>
    </div>
  </div>


@endsection
