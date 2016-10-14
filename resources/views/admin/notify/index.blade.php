@extends('admin.app')

@section('content')
  <div class="p-md">
    <div class="panel panel-default">
      <div class="panel-heading bg-white">
        <i class="fa fa-bars"></i> {{trans('admin/notify.listing_items')}}
      </div>

      <div class="panel-body">
        <a href="{{ url('panel-admin/notify/create') }}" class="btn btn-sm btn-addon btn-success">
          <i class="fa fa-plus fa-fw"></i>
          {{trans('admin/notify.create')}}
        </a>
      </div>
      @if(count($messages))
        <table class="table">
          <thead>
              <tr>
                  <th>#</th><th>Message</th><th>Actions</th>
              </tr>
          </thead>
          <tbody>
            @foreach($messages as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td><a href="{{ url('panel-admin/notify/' . $item->id . '/edit') }}">{{ $item->message }}</a></td>

                    <td>
                        <a href="{{ url('panel-admin/notify/' . $item->id . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['panel-admin/notify', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs', 'onclick' => "if(!confirm('Are you sure?')) return false;"]) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>

        <div class="pagination"> {!! $messages->render() !!} </div>
      @endif
    </div>
  </div>



@endsection
