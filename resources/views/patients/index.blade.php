@extends('layouts.app')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">

      <h3>Patients</h3>

      <div class="actions">
        <a href="{{ route('patients.create') }}" class="btn btn-default btn-success" title="create a new Patient">new</a>
      </div>
      
    </div>
    <div class="panel-body">

      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Created</th>
            <th>Name</th>
            <th>Email</th>
            <th>Surgeon</th>
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
            <td>{{ $patient->created_at }}</td>
            <td>{{ $patient->name }}</td>
            <td>{{ $patient->email }}</td>
            <td>{{ $patient->surgeon->name }}</td>
            <td>
              <a class="btn btn-default"
              	href="{{ route('patients.show', $patient->id) }}">View</a>

              <a class="btn btn-default"
              	href="{{ route('patients.edit', $patient->id) }}">Edit</a>
              	
              {{ Form::open(['method' => 'DELETE', 'route' => ['patients.destroy', $patient->id], 'class' => 'form-delete']) }}
              {{ Form::submit('Remove', ['class' => 'btn btn-danger']) }}
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