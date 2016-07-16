@extends('admin.app')

@section('content')
  @include('admin.users._nav')
  <div class="p-md">
    <div class="panel panel-default">
      <div class="panel-heading bg-white">
        <i class="fa fa-bars"></i> {{trans('admin/users.listing_items')}}
      </div>
      @if(count($users))
        <table class="table">
          <thead>
              <tr>
                  <th>#</th><th>Name</th><th>Email</th><th>Actions</th>
              </tr>
          </thead>
          <tbody>
            @foreach($users as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td><td>{{ $item->email }}</td>
                    <td>
                        <a href="{{ url('panel-admin/users/' . $item->id . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['panel-admin/users', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs', 'onclick' => "if(!confirm('Are you sure?')) return false;"]) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>

        <div class="pagination"> {!! $users->render() !!} </div>
      @endif
    </div>
  </div>



@endsection
