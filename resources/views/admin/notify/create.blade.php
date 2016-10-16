@extends('admin.app')

@section('content')
  {{-- @include('admin.users._nav') --}}

  <div class="p-md">
    <div class="panel panel-default">
      <div class="panel-heading bg-white">
        <i class="fa fa-bars"></i> {{trans('admin/users.create')}}
      </div>

      <div class="panel-body">
        {!! Form::open(['url' => 'panel-admin/notify', 'class' => 'form-horizontal']) !!}

          <div class="form-group {{ $errors->has('message') ? 'has-error' : ''}}">
            {!! Form::label('message', 'Message: ', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
              {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
              {!! Form::text('icon', null, ['class' => 'form-control']) !!}
              {!! Form::text('icon_color', null, ['class' => 'form-control']) !!}
              {!! Form::text('node_id', null, ['class' => 'form-control']) !!}
              {!! $errors->first('message', '<p class="help-block">:message</p>') !!}
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-3">
              {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
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
