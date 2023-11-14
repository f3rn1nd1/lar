@extends('layouts.app')

@section('template_title')
{{ $jobOffer->name ?? 'Show Job Offer' }}
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">Show Job Offer</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('joboffers.index') }}">Back</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <strong>User Rut:</strong>
                        {{ $jobOffer->user_rut }}
                    </div>
                    <div class="form-group">
                        <strong>Empresa:</strong>
                        {{ $jobOffer->empresa }}
                    </div>
                    <div class="form-group">
                        <strong>Puesto:</strong>
                        {{ $jobOffer->puesto }}
                    </div>
                    <div class="form-group">
                        <strong>Descripción:</strong>
                        {{ $jobOffer->descripcion }}
                    </div>
                    <div class="form-group">
                        <strong>Choosen One:</strong>
                        {{ $jobOffer->choosen_one }}
                    </div>
                    <div class="form-group">
                        <strong>Fecha de Creación:</strong>
                        {{ $jobOffer->created_at }}
                    </div>
                </div>
            </div>

            @if(isset($jobOffer->requirements_json['skills']) && is_array($jobOffer->requirements_json['skills']))
    <div class="card mt-5">
        <div class="card-body">
            @foreach ($jobOffer->requirements_json['skills'] as $skill)
                <p>{{ $skill }}</p>
            @endforeach
        </div>
    </div>
    @else
        <p>No skills information available.</p>
    @endif

    <!-- Bloque para 'experience' -->
    @if(isset($jobOffer->requirements_json['experience']) && is_array($jobOffer->requirements_json['experience']))
    <div class="card mt-5">
        <div class="card-body">
            @foreach ($jobOffer->requirements_json['experience'] as $experience)
                <p>{{ $experience }}</p>
            @endforeach
        </div>
    </div>
    @else
        <p>No experience information available.</p>
    @endif

    <!-- Bloque para 'studies' -->
    @if(isset($jobOffer->requirements_json['studies']) && is_array($jobOffer->requirements_json['studies']))
    <div class="card mt-5">
        <div class="card-body">
            @foreach ($jobOffer->requirements_json['studies'] as $study)
                <p>{{ $study }}</p>
            @endforeach
        </div>
    </div>
    @else
        <p>No studies information available.</p>
    @endif


            <!-- Aquí iría el resto de tu código para mostrar otros datos si es necesario -->
        </div>
    </div>
</section>
@endsection