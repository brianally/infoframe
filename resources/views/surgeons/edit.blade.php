@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading">
      <h3>Edit Surgeon</h3>
    </div>
    <div class="panel-body">
      {!! Form::model($surgeon, ['method' => 'PATCH', 'route'=> ['surgeons.update', $surgeon->id]]) !!}

      @include ('surgeons._form', ['submitBtnText' => 'Update'])

      {!! Form::close() !!}
    </div>
  </div>
@endsection