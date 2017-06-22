@extends('layouts.app')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">

      <h3>Surgeons</h3>

      <div class="actions">
        <a href="{{ route('surgeons.create') }}" class="new-item" title="create a new Surgeon">New</a>
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
            <td class="hidden-xs">{{ $surgeon->created_at }}</td>
            <td>{{ $surgeon->name }}</td>
            <td class="hidden-xs">{{ $surgeon->email }}</td>
            <td class="actions">
              <a href="{{ route('surgeons.show', $surgeon->id) }}">View</a>

              <a href="{{ route('surgeons.edit', $surgeon->id) }}">Edit</a>
              	
              {{ Form::open(['method' => 'DELETE', 'route' => ['surgeons.destroy', $surgeon->id], 'class' => 'form-delete']) }}
              {{ Form::submit('Remove') }}
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