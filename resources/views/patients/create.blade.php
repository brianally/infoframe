@extends('layouts.app')

@section('content')
  
  <div class="panel panel-default">
    <div class="panel-heading">
      Add New Patient
    </div>
    <div class="panel-body">

      {{ Form::open(['route' => 'patients.store', 'method' => 'POST']) }}
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

      <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
        {{ Form::label('phone', 'Telephone') }}
        {{ Form::text('phone', old('phone'), ['class' => 'form-control']) }}

        @if ($errors->has('phone'))
          <span class="help-block">{{ $errors->first('phone') }}</span>
        @endif
      </div>

      <div class="form-group {{ $errors->has('age') ? 'has-error' : '' }}">
        {{ Form::label('age', 'Age') }}
        {{ Form::text('age', old('age'), ['class' => 'form-control']) }}

        @if ($errors->has('age'))
          <span class="help-block">{{ $errors->first('age') }}</span>
        @endif
      </div>

      <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
        @foreach ( $genders as $key => $val )
          <label class="radio-inline">
            <input type="radio" name="gender" value="{{ $key }}"> {{ $val }}
          </label>
        @endforeach

        @if ($errors->has('gender'))
          <span class="help-block">{{ $errors->first('gender') }}</span>
        @endif
      </div>

      <div class="form-group {{ $errors->has('surgeon_id') ? 'has-error' : '' }}">
        {{ Form::label('surgeon_id', 'Surgeon') }}
        {{ Form::select('surgeon_id', $surgeons, old('surgeon_id'), ['class' => 'form-control']) }}

        @if ($errors->has('surgeon_id'))
          <span class="help-block">{{ $errors->first('surgeon_id') }}</span>
        @endif
      </div>

      <div class="form-group">
        {{ Form::submit('Add', ['class'=> 'btn btn-success']) }}
        <a href="{{ route('patients.index') }}" class="btn btn-danger">Cancel</a>
      </div>
        

      {{ Form::close() }}
        
    </div>
  </div>

@endsection