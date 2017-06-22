@extends('layouts.app')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">

      <h3>Patients</h3>

      <div class="actions">
        <a href="{{ route('patients.create') }}" class="new-item" title="create a new Patient">New</a>
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
            <th class="hidden-xs">Surgeon</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th colspan="5">{{ $patients->render() }}</th>
          </tr>
        </tfoot>
        <tbody>
        @if (count($patients) > 0)
          @foreach ($patients as $patient)
          <tr>
            <td class="hidden-xs">{{ $patient->created_at }}</td>
            <td>{{ $patient->name }}</td>
            <td class="hidden-xs">{{ $patient->email }}</td>
            <td class="hidden-xs">{{ $patient->surgeon->name }}</td>
            <td class="actions">
              <a href="{{ route('patients.show', $patient->id) }}">View</a>

              <a href="{{ route('patients.edit', $patient->id) }}">Edit</a>
              
              {{ Form::open(['method' => 'DELETE', 'route' => ['patients.destroy', $patient->id], 'class' => 'form-delete']) }}
              {{ Form::submit('Remove') }}
              {{ Form::close() }}
            </td>
          </tr>
          @endforeach
        @else
          <tr>
            <th colspan="5" class="no-results">No patients found</th>
          </tr>
        @endif
        </tbody>
      </table>
    </div>

  </div>
@endsection