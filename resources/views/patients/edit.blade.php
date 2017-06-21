@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading">
      <h3>Edit Patient</h3>
    </div>
    <div class="panel-body">
      {!! Form::model($patient, ['method' => 'PATCH', 'route'=> ['patients.update', $patient->id]]) !!}

      @include ('patients._form', ['submitBtText' => 'Update'])

      {!! Form::close() !!}
    </div>
  </div>
@endsection