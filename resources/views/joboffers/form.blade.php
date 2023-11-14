<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('user_rut') }}
            {{ Form::text('user_rut', old('user_rut', $user->rut), ['class' => 'form-control' . ($errors->has('user_rut') ? ' is-invalid' : ''), 'placeholder' => 'User Rut', 'readonly']) }}
            {!! $errors->first('user_rut', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('puesto') }}
            {{ Form::text('puesto', $job->puesto, ['class' => 'form-control' . ($errors->has('puesto') ? ' is-invalid' : ''), 'placeholder' => 'Puesto']) }}
            {!! $errors->first('puesto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('empresa') }}
            {{ Form::text('empresa', $job->empresa, ['class' => 'form-control' . ($errors->has('empresa') ? ' is-invalid' : ''), 'placeholder' => 'Empresa']) }}
            {!! $errors->first('empresa', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $job->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripción']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('skills', 'Habilidades') }}
            {{ Form::text('skills', null, ['class' => 'form-control' . ($errors->has('skills') ? ' is-invalid' : ''), 'placeholder' => 'Escribe las habilidades separadas por comas']) }}
            {!! $errors->first('skills', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <!-- Campo de Estudios (Studies) -->
        <div class="form-group">
            {{ Form::label('studies', 'Estudios') }}
            {{ Form::text('studies', null, ['class' => 'form-control' . ($errors->has('studies') ? ' is-invalid' : ''), 'placeholder' => 'Escribe los estudios separados por comas']) }}
            {!! $errors->first('studies', '<div class="invalid-feedback">:message</div>') !!}
        </div>


        <!-- Campo de Experiencia (Experience) -->
        <div class="form-group">
            {{ Form::label('experience', 'Experiencia') }}
            {{ Form::text('experience', null, ['class' => 'form-control' . ($errors->has('experience') ? ' is-invalid' : ''), 'placeholder' => 'Experiencia']) }}
            {!! $errors->first('experience', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <!-- Campo de Edad (Age) -->
        <div class="form-group">
            {{ Form::label('age', 'Edad') }}
            {{ Form::number('age', null, ['class' => 'form-control' . ($errors->has('age') ? ' is-invalid' : ''), 'placeholder' => 'Edad']) }}
            {!! $errors->first('age', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <!-- Campo de Sexo (Sex) -->
        <div class="form-group">
            {{ Form::label('sex', 'Sexo') }}
            {{ Form::select('sex', ['' => 'Seleccione', 'male' => 'Masculino', 'female' => 'Femenino', 'other' => 'Otro'], null, ['class' => 'form-control' . ($errors->has('sex') ? ' is-invalid' : '')]) }}
            {!! $errors->first('sex', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
        {!! $errors->first('submit', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>