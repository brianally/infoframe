@extends('layouts.app')

@section('content')
  
  <div class="panel panel-default">
    <div class="panel-heading">
      Add New Surgeon
    </div>
    <div class="panel-body">

      {{ Form::open(['route' => 'surgeons.store', 'method' => 'POST']) }}

      @include ('surgeons._form', ['submitBtnText' => 'Create'])

      {{ Form::close() }}
        
    </div>
  </div>

@endsection