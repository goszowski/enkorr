@extends('admin.app')

@section('content')
  @include('admin.users._nav')

  <div class="p-md">
    <div class="panel panel-default">
      <div class="panel-heading bg-white">
        <i class="fa fa-bars"></i> {{trans('admin/users.create')}}
      </div>

      <div class="panel-body">
        {!! Form::open(['url' => 'panel-admin/users', 'class' => 'form-horizontal']) !!}

                    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                    {!! Form::label('name', 'Name: ', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-6">
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                    {!! Form::label('email', 'Email: ', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-6">
                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                    {!! Form::label('password', 'Password: ', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-6">
                        {!! Form::text('password', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
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
