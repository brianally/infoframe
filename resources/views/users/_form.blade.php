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

@if ( isset($includePassword) && $includePassword )

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

@endif

      <div class="form-group actions">
        {{ Form::submit($submitBtnText, ['class'=> 'submit']) }}
        <a href="{{ route('users.index') }}" class="cancel">Cancel</a>
      </div>