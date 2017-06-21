@extends('layouts.app')

@section('content')
  
  <div class="panel panel-default">
    <div class="panel-heading">
      Add New User
    </div>
    <div class="panel-body">

      {{ Form::open(['route' => 'users.store', 'method' => 'POST']) }}
      <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', old('name'), ['class' => 'form-control']) }}

        @if ($errors->has('name'))
          <span class="help-block">{{ $errors->first('name') }}</span>
        @endif
      </div>

      <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
        {{ Form::label('email', 'Email') }}
        {{ Form::text('email', old('email'), ['class' => 'form-control']) }}

        @if ($errors->has('email'))
          <span class="help-block">{{ $errors->first('email') }}</span>
        @endif
      </div>

      <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
        {{ Form::label('password', 'Password') }}
        {{ Form::password('password', ['class' => 'form-control']) }}

        @if ($errors->has('password'))
          <span class="help-block">{{ $errors->first('password') }}</span>
        @endif
      </div>

      <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
        {{ Form::label('password_confirmation', 'Confirm Password') }}
        {{ Form::password('password_confirmation', ['class' => 'form-control']) }}

        @if ($errors->has('password_confirmation'))
          <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
        @endif
      </div>

      <div class="form-group">
        {{ Form::submit('Add', ['class'=> 'btn btn-info']) }}
        <a href="{{ route('users.index') }}" class="btn btn-danger">Cancel</a>
      </div>
        

      {{ Form::close() }}
        
    </div>
  </div>

@endsection