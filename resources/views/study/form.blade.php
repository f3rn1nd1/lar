<div class="box box-info padding-1">
    <div class="box-body">
        
    <div class="form-group">
    {{ Form::label('user_rut') }}
    {{ Form::text('user_rut', old('user_rut', $user->rut), ['class' => 'form-control' . ($errors->has('user_rut') ? ' is-invalid' : ''), 'placeholder' => 'User Rut', 'readonly']) }}
    {!! $errors->first('user_rut', '<div class="invalid-feedback">:message</div>') !!}
</div>

        <div class="form-group">
            {{ Form::label('Universidad') }}
            {{ Form::text('Universidad', $study->Universidad, ['class' => 'form-control' . ($errors->has('Universidad') ? ' is-invalid' : ''), 'placeholder' => 'Universidad']) }}
            {!! $errors->first('Universidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Titulo') }}
            {{ Form::text('Titulo', $study->Titulo, ['class' => 'form-control' . ($errors->has('Titulo') ? ' is-invalid' : ''), 'placeholder' => 'Titulo']) }}
            {!! $errors->first('Titulo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('f_inicio') }}
            {{ Form::date('f_inicio', $study->f_inicio, ['class' => 'form-control' . ($errors->has('f_inicio') ? ' is-invalid' : ''), 'placeholder' => 'F Inicio']) }}
            {!! $errors->first('f_inicio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('f_fin') }}
            {{ Form::date('f_fin', $study->f_fin, ['class' => 'form-control' . ($errors->has('f_fin') ? ' is-invalid' : ''), 'placeholder' => 'F Fin']) }}
            {!! $errors->first('f_fin', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>