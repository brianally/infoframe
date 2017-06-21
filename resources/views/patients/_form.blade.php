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
          <label class="radio-inline" for="gender_{{ $key }}">

            @if ( isset($patient) )
              {{ Form::radio('gender', $key, $patient->gender == $key, ['id' => "gender_${key}"]) }}
            @else
              <input type="radio" name="gender" value="{{ $key }}" id="{{ "gender_${key}" }}"
                {{ old('gender') === $key ? 'checked' : '' }}>
            @endif

            {{ $val }}            
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

      <div class="form-group actions">
        {{ Form::submit('Add', ['class'=> 'submit']) }}
        <a href="{{ route('patients.index') }}" class="cancel">Cancel</a>
      </div>