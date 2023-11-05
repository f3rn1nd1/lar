<div class="box box-info padding-1">
    <div class="box-body">
        
    <div class="form-group">
    {{ Form::label('user_rut') }}
    {{ Form::text('user_rut', old('user_rut', $user->rut), ['class' => 'form-control' . ($errors->has('user_rut') ? ' is-invalid' : ''), 'placeholder' => 'User Rut', 'readonly']) }}
    {!! $errors->first('user_rut', '<div class="invalid-feedback">:message</div>') !!}
</div>

        <div class="form-group">
            {{ Form::label('tipo_habilidad') }}
            {{ Form::text('tipo_habilidad', $skill->tipo_habilidad, ['class' => 'form-control' . ($errors->has('tipo_habilidad') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Habilidad']) }}
            {!! $errors->first('tipo_habilidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nivel_habilidad') }}
            {{ Form::text('nivel_habilidad', $skill->nivel_habilidad, ['class' => 'form-control' . ($errors->has('nivel_habilidad') ? ' is-invalid' : ''), 'placeholder' => 'Nivel Habilidad']) }}
            {!! $errors->first('nivel_habilidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>