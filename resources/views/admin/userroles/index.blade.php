@extends('layouts.master')

@section('content')

    <h1>Userrole <a href="{{ url('userrole/create') }}" class="btn btn-primary pull-right btn-sm">Add New Userrole</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>User Id</th><th>Role Id</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($userroles as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('userrole', $item->id) }}">{{ $item->user_id }}</a></td><td>{{ $item->role_id }}</td>
                    <td>
                        <a href="{{ url('userrole/' . $item->id . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['userrole', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $userroles->render() !!} </div>
    </div>

@endsection
