@extends('layouts.app')

@section('template_title')
    {{ $experience->name ?? "{{ __('Show') Experience" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Experience</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('experiences.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>User Rut:</strong>
                            {{ $experience->user_rut }}
                        </div>
                        <div class="form-group">
                            <strong>Empresa:</strong>
                            {{ $experience->empresa }}
                        </div>
                        <div class="form-group">
                            <strong>Puesto:</strong>
                            {{ $experience->puesto }}
                        </div>
                        <div class="form-group">
                            <strong>F Inicio:</strong>
                            {{ $experience->f_inicio }}
                        </div>
                        <div class="form-group">
                            <strong>F Fin:</strong>
                            {{ $experience->f_fin }}
                        </div>
                        <div class="form-group">
                            <strong>Nivel Experiencia:</strong>
                            {{ $experience->nivel_experiencia }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
