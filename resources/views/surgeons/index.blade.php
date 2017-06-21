@extends('layouts.app')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">

      <h3>Surgeons</h3>

      <div class="actions">
        <a href="{{ route('surgeons.create') }}" class="btn btn-default btn-success" title="create a new Surgeon">new</a>
      </div>
      
    </div>
    <div class="panel-body">

      @if ( $errors->any() )
        <div class="alert alert-danger">
          <h4>{{ $errors->first() }}</h4>
        </div>
      @endif

      @if ( Session::has('info') )
        <div class="alert alert-info">
          <h4>{{ Session::get('info') }}</h4>
        </div>
      @endif

      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Created</th>
            <th>Name</th>
            <th>Email</th>
            <th>Patients</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th colspan="4">{{ $surgeons->render() }}</th>
          </tr>
        </tfoot>
        <tbody>
        @if (count($surgeons) > 0)
          @foreach ($surgeons as $surgeon)
          <tr>
            <td>{{ $surgeon->created_at }}</td>
            <td>{{ $surgeon->name }}</td>
            <td>{{ $surgeon->email }}</td>
            <!-- stupid Collection tricks -->
            <td>{{ implode( ', ', $surgeon->patients->pluck('name')->toArray() ) }}</td>
            <td>
              <a class="btn btn-default"
              	href="{{ route('surgeons.show', $surgeon->id) }}">View</a>

              <a class="btn btn-default"
              	href="{{ route('surgeons.edit', $surgeon->id) }}">Edit</a>
              	
              {{ Form::open(['method' => 'DELETE', 'route' => ['surgeons.destroy', $surgeon->id], 'class' => 'form-delete']) }}
              {{ Form::submit('Remove', ['class' => 'btn btn-danger']) }}
              {{ Form::close() }}
            </td>
          </tr>
          @endforeach
        @else
          <tr>
            <th colspan="4" class="no-results">No surgeons found</th>
          </tr>
        @endif
        </tbody>
      </table>
    </div>
  </div>
@endsection