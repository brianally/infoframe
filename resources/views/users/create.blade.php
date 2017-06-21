@extends('layouts.app')

@section('content')
  
  <div class="panel panel-default">
    <div class="panel-heading">
      Add New User
    </div>
    <div class="panel-body">

      {{ Form::open(['route' => 'users.store', 'method' => 'POST']) }}

      @include ('users._form', ['submitBtnText' => 'Create', 'includePassword' => true] )        

      {{ Form::close() }}
        
    </div>
  </div>

@endsection