@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading">
      <h3>Edit User</h3>
    </div>
    <div class="panel-body">
      {!! Form::model($user, ['method' => 'PATCH', 'route'=> ['users.update', $user->id]]) !!}

      @include ('users._form', ['submitBtnText' => 'Update'] )
      
      {!! Form::close() !!}
    </div>
  </div>
@endsection