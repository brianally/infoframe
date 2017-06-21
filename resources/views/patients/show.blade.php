@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading">
      <h3>Patient Details</h3>

      <div class="actions">
        <a href="{{ route('patients.index') }}" class="btn btn-default" title="back to patients list">go back</a>
      </div>
    </div>
    <div class="panel-body">
      <div class="form-group">Name: {{ $patient->name }}</div>
      <div class="form-group">Email: <a href="mailto:{{ $patient->email }}" title="contact this patient">{{ $patient->email }}</a></div>
      <div class="form-group">Phone: {{ $patient->phone }}</div>
      <div class="form-group">Age: {{ $patient->age }}</div>
      <div class="form-group">Gender: {{ $genders[ $patient->gender ] }}</div>
      <div class="form-group">Surgeon: {{ $patient->surgeon->name }}</div>
      <div class="form-group">Created: {{ $patient->created_at }}</div>
      <div class="form-group">Updated: {{ $patient->updated_at }}</div>
    </div>
  </div>
@endsection
