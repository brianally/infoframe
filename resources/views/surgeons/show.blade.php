@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading">
      <h3>Surgeon Details</h3>

      <div class="actions">
        <a href="{{ route('surgeons.index') }}" class="btn btn-default" title="back to surgeons list">go back</a>
      </div>
    </div>
    <div class="panel-body">
      <div class="form-group">Name: {{ $surgeon->name }}</div>
      <div class="form-group">Email: <a href="mailto:{{ $surgeon->email }}" title="contact this surgeon">{{ $surgeon->email }}</a></div>
      <div class="form-group">Created: {{ $surgeon->created_at }}</div>
      <div class="form-group">Updated: {{ $surgeon->updated_at }}</div>
    </div>
  </div>
@endsection
