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
            {{ Form::label('skills') }}
            {{ Form::select('animal', array(
                'Cats' => array('leopard' => 'Leopard'),
                'Dogs' => array('spaniel' => 'Spaniel'),
            ))}}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
        {!! $errors->first('submit', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>