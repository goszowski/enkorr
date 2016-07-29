@extends('admin.app')

@section('content')
  {{-- @include('admin.users._nav') --}}
  <div class="p-md">
    <div class="panel panel-default">
      <div class="panel-heading bg-white">
        <i class="fa fa-bars"></i> {{trans('admin/users.listing_items')}}
      </div>

      <div class="panel-body">
        <a href="{{ url('panel-admin/users/create') }}" class="btn btn-sm btn-addon btn-success">
          <i class="fa fa-plus fa-fw"></i>
          {{trans('admin/users.create')}}
        </a>
      </div>
      @if(count($users))
        <table class="table">
          <thead>
              <tr>
                  <th>#</th><th>Name</th><th>Email</th><th>Limited</th><th>Actions</th>
              </tr>
          </thead>
          <tbody>
            @foreach($users as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td><a href="{{ url('panel-admin/users/' . $item->id . '/edit') }}">{{ $item->name }}</a></td><td>{{ $item->email }}</td>
                    <td>
                      @if($item->is_limited)
                        <span class="label bg-danger">Yes</span>
                      @else
                        <span class="label ">No</span>
                      @endif
                    </td>
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
