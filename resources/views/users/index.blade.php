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

      @if (count($users) > 0)
        <ul>
          @foreach ($users as $user)
          
          <li><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></li>

          @endforeach
        </ul>

        {{ $users->render() }}
        
        @else
  
          <h4 class="no-results">No users found</h4>

        @endif
    </div>
  </div>
@endsection