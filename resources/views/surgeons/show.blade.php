@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading">
      <h3>Surgeon Details</h3>

      <div class="actions">

        <a href="{{ route('surgeons.edit', $surgeon->id) }}">Edit</a>
          
        {{ Form::open(['method' => 'DELETE', 'route' => ['surgeons.destroy', $surgeon->id], 'class' => 'form-delete']) }}
        {{ Form::submit('Remove') }}
        {{ Form::close() }}

        <a href="{{ route('surgeons.index') }}" title="back to surgeons list">go back</a>
      </div>
    </div>
    <div class="panel-body">
      <table class="table-details">
        <tr>
          <th>Name:</th>
          <td>{{ $surgeon->name }}</td>
        </tr>
        <tr>
          <th>Email:</th>
          <td><a href="mailto:{{ $surgeon->email }}"
            title="contact this surgeon">{{ $surgeon->email }}</a></td>
        </tr>
        <tr>
          <th>Created:</th>
          <td>{{ $surgeon->created_at }}</td>
        </tr>
        <tr>
          <th>Updated:</th>
          <td>{{ $surgeon->updated_at }}</td>
        </tr>
        <tr>
        <tr>
          <th>Patients:</th>
          <td>
            @if ( $surgeon->patients->count() )
            <ul>
              @foreach ( $surgeon->patients as $patient )

              <li><a href="{{ route('patients.show', $patient->id) }}"
                title="view this patient">{{ $patient->name }}</a></li>

              @endforeach
            </ul>
            @endif
          </td>
        </tr>
      </table>
    </div>
  </div>
@endsection
