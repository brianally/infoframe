@extends('layouts.app')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">

      <h3>Users</h3>

      <div class="actions">
        <a href="{{ route('users.create') }}" class="new-item" title="create a new User">New</a>
      </div>
      
    </div>
    <div class="panel-body">

      @include ('partials.error-messages')

      @include ('partials.session-info')

      <table class="table-index">
        <thead>
          <tr>
            <th class="hidden-xs">Created</th>
            <th>Name</th>
            <th class="hidden-xs">Email</th>
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
            <td class="hidden-xs">{{ $user->created_at }}</td>
            <td>{{ $user->name }}</td>
            <td class="hidden-xs">{{ $user->email }}</td>
            <td class="actions">
              <a href="{{ route('users.show', $user->id) }}">View</a>

              <a href="{{ route('users.edit', $user->id) }}">Edit</a>
              	
              {{ Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'class' => 'form-delete']) }}
              {{ Form::submit('Remove') }}
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