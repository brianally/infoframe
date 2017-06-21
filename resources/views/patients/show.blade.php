@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading">
      <h3>Patient Details</h3>

      <div class="actions">
        <a href="{{ route('patients.index') }}" title="back to patients list">go back</a>
      </div>
    </div>
    <div class="panel-body">
      <table class="table-details">
        <tr>
          <th>Name:</th>
          <td>{{ $patient->name }}</td>
        </tr>
        <tr>
          <th>Email:</th>
          <td><a href="mailto:{{ $patient->email }}" title="contact this patient">{{ $patient->email }}</a></td>
        </tr>
        <tr>
          <th>Phone:</th>
          <td>{{ $patient->phone }}</td>
        </tr>
        <tr>
          <th>Age:</th>
          <td>{{ $patient->age }}</td>
        </tr>
        <tr>
          <th>Gender:</th>
          <td>{{ $genders[ $patient->gender ] }}</td>
        </tr>
        <tr>
          <th>Surgeon:</th>
          <td>{{ $patient->surgeon->name }}</td>
        </tr>
        <tr>
          <th>Created:</th>
          <td>{{ $patient->created_at }}</td>
        </tr>
        <tr>
          <th>Updated:</th>
          <td>{{ $patient->updated_at }}</td>
        </tr>
      </table>
    </div>
  </div>
@endsection
