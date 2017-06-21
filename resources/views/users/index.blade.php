@extends('layouts.app')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">

      <h3>Users</h3>

      <div class="actions">
        <a href="{{ route('users.create') }}" class="btn btn-default btn-success" title="create a new User">new</a>
      </div>
      
    </div>
    <div class="panel-body">

      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Created</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th colspan="4">{{ $users->render() }}</th>
          </tr>
        </tfoot>
        <tbody>
        @if (count($users) > 0)
          @foreach ($users as $user)
          <tr>
            <td>{{ $user->created_at }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
              <a class="btn btn-default"
              	href="{{ route('users.show', $user->id) }}">View</a>

              <a class="btn btn-default"
              	href="{{ route('users.edit', $user->id) }}">Edit</a>
              	
              {{ Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'class' => 'form-delete']) }}
              {{ Form::submit('Remove', ['class' => 'btn btn-danger']) }}
              {{ Form::close() }}
            </td>
          </tr>
          @endforeach
        @else
          <tr>
            <th colspan="4" class="no-results">No users found</th>
          </tr>
        @endif
        </tbody>
      </table>
    </div>
  </div>
@endsection