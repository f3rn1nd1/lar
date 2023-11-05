<div class="box box-info padding-1">
    <div class="box-body">
        
    <div class="form-group">
    {{ Form::label('user_rut') }}
    {{ Form::text('user_rut', old('user_rut', $user->rut), ['class' => 'form-control' . ($errors->has('user_rut') ? ' is-invalid' : ''), 'placeholder' => 'User Rut', 'readonly']) }}
    {!! $errors->first('user_rut', '<div class="invalid-feedback">:message</div>') !!}
</div>
        <div class="form-group">
            {{ Form::label('empresa') }}
            {{ Form::text('empresa', $experience->empresa, ['class' => 'form-control' . ($errors->has('empresa') ? ' is-invalid' : ''), 'placeholder' => 'Empresa']) }}
            {!! $errors->first('empresa', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('puesto') }}
            {{ Form::text('puesto', $experience->puesto, ['class' => 'form-control' . ($errors->has('puesto') ? ' is-invalid' : ''), 'placeholder' => 'Puesto']) }}
            {!! $errors->first('puesto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('f_inicio') }}
            {{ Form::date('f_inicio', $experience->f_inicio, ['class' => 'form-control' . ($errors->has('f_inicio') ? ' is-invalid' : ''), 'placeholder' => 'F Inicio']) }}
            {!! $errors->first('f_inicio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('f_fin') }}
            {{ Form::date('f_fin', $experience->f_fin, ['class' => 'form-control' . ($errors->has('f_fin') ? ' is-invalid' : ''), 'placeholder' => 'F Fin']) }}
            {!! $errors->first('f_fin', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nivel_experiencia') }}
            {{ Form::text('nivel_experiencia', $experience->nivel_experiencia, ['class' => 'form-control' . ($errors->has('nivel_experiencia') ? ' is-invalid' : ''), 'placeholder' => 'Nivel Experiencia']) }}
            {!! $errors->first('nivel_experiencia', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>