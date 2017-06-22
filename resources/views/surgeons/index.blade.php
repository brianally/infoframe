@extends('layouts.app')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">

      <h3>All Surgeons</h3>

      <div class="actions">
        <a href="{{ route('surgeons.create') }}" class="new-item" title="create a new Surgeon">New</a>
      </div>

    </div>
    <div class="panel-body">

      @include ('partials.error-messages')

      @include ('partials.session-info')

      @if (count($surgeons) > 0)

      <ul>
        @foreach ($surgeons as $surgeon)

          <li><a href="{{ route('surgeons.show', $surgeon->id) }}">{{ $surgeon->name }}</a></li>

        @endforeach
      </ul>

      {{ $surgeons->render() }}

      @else
         <h4 class="no-results">No surgeons found</h4>
      @endif

    </div>
  </div>
@endsection
