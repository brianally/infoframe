@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading">
      <h3>User Details</h3>

      <div class="actions">
        <a href="{{ route('users.index') }}" title="back to users list">go back</a>
      </div>
    </div>
    <div class="panel-body">
      <table class="table-details">
        <tr>
          <th>Name:</th>
          <td>{{ $user->name }}</td>
        </tr>
        <tr>
          <th>Email:</th>
          <td><a href="mailto:{{ $user->email }}" title="contact this user">{{ $user->email }}</a></td>
        </tr>
        <tr>
          <th>Created:</th>
          <td>{{ $user->created_at }}</td>
        </tr>
        <tr>
          <th>Updated:</th>
          <td>{{ $user->updated_at }}</td>
        </tr>
      </table>
    </div>
  </div>
@endsection