@extends('layouts.app')

@section('template_title')
    {{ $skill->name ?? "{{ __('Show') Skill" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Skill</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('skills.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>User Rut:</strong>
                            {{ $skill->user_rut }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Habilidad:</strong>
                            {{ $skill->tipo_habilidad }}
                        </div>
                        <div class="form-group">
                            <strong>Nivel Habilidad:</strong>
                            {{ $skill->nivel_habilidad }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
