@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading">
      <h3>User Details</h3>

      <div class="actions">
        <a href="{{ route('users.index') }}" class="btn btn-default" title="back to users list">go back</a>
      </div>
    </div>
    <div class="panel-body">
      <div class="form-group">Name: {{ $user->name }}</div>
      <div class="form-group">Email: {{ $user->email }}</div>
      <div class="form-group">Created: {{ $user->created_at }}</div>
      <div class="form-group">Updated: {{ $user->updated_at }}</div>
    </div>
  </div>
@endsection