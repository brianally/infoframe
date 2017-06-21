@extends('layouts.app')

@section('content')
  
  <div class="panel panel-default">
    <div class="panel-heading">
      Add New Patient
    </div>
    <div class="panel-body">

      {{ Form::open(['route' => 'patients.store', 'method' => 'POST']) }}

      @include ('patients._form', ['submitBtText' => 'Create'])

      {{ Form::close() }}
        
    </div>
  </div>

@endsection