@extends('layouts.app')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">

      <h3>All Patients</h3>

      <div class="actions">
        <a href="{{ route('patients.create') }}" class="new-item" title="create a new Patient">New</a>
      </div>

    </div>
    <div class="panel-body">

      @include ('partials.error-messages')

      @include ('partials.session-info')


      @if (count($patients) > 0)

      <ul>
        @foreach ($patients as $patient)

          <li><a href="{{ route('patients.show', $patient->id) }}">{{ $patient->name }}</a></li>

        @endforeach

      </ul>

      {{ $patients->render() }}

      @else

        <h4 class="no-results">No patients found</h4>

      @endif

    </div>

  </div>
@endsection
