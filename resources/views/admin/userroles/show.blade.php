@extends('layouts.master')

@section('content')

    <h1>Userrole</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>User Id</th><th>Role Id</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $userrole->id }}</td> <td> {{ $userrole->user_id }} </td><td> {{ $userrole->role_id }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection