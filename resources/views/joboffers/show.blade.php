@extends('layouts.app')

@section('template_title')
    {{ $jobOffer->name ?? "{{ __('Show') jobOffer" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} jobOffer</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('joboffers.index') }}"> {{ __('Back') }}</a>
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
                            <strong>F Inicio:</strong>
                            {{ $jobOffer->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>F Fin:</strong>
                            {{ $jobOffer->choosen_one }}
                        </div>
                        
                        <div class="form-group">
                            <strong>Nivel Experiencia:</strong>
                            {{ $jobOffer->created_at }}
                        </div>

                    </div>
                    </div>
                     <div class="card mt-5">
                        <div class="card-header">
                            <div class="float-left">
                                <span class="card-title">{{ __('Show') }} Candidates</span>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                    <thead class="thead">
                                        <tr>
                                            <th>Rank</th>
                                            <th>Candidate Rut</th>
                                            <th>Name</th>
                                            <th>Surname</th>
                                            <th>Email</th>
                                            <th>Score</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $candidates)
                                            <tr>
                                                <td>{{ 
                                                $loop->iteration }}</td>
                                                <td>{{ $candidates->rut }}</td>
                                                <td>{{ $candidates->nombre }}</td>
                                                <td>{{ $candidates->apellido_paterno }}</td>
                                                <td>{{ $candidates->email }}</td>
                                                <td>{{ $candidates->score }}</td>

                                                <td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>

                    <div class="card mt-5">
                        <div class="card-header">
                            <div class="float-left">
                                <span class="card-title">{{ __('Show') }} Skills</span>
                            </div>
                            <div class="float-right">
                                 <a href="{{ route('insertjson', ['id' => $jobOffer->id]) }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                    <thead class="thead">
                                        <tr>
                                            <th>No</th>
                                            <th>Recruiter Rut</th>
                                            <th>Description</th>
                                            <th>Position</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jobOffer->requirements_json['skills'] as $skills)
                                            <tr>
                                                
                                                <td>{{ $skills->requirements }}</td>
                                                <td>{{ $skills->skill_level }}</td>
                                                <td>{{ $skills->priority }}</td>
                                                <td>{{ $skills->is_exclusive }}</td>

                                                <td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>
                    <div class="card mt-5">
                        <div class="card-header">
                            <div class="float-left">
                                <span class="card-title">{{ __('Show') }} Experience</span>
                            </div>
                        <div class="float-right">
                                <a href="{{ route('joboffers.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                        <tr>
                                            <th>No</th>
                                            <th>Recruiter Rut</th>
                                            <th>Description</th>
                                            <th>Position</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jobOffer->requirements_json['experience'] as $experience)
                                            <tr>
                                                
                                                <td>{{ $experience->requirements }}</td>
                                                <td>{{ $experience->skill_level }}</td>
                                                <td>{{ $experience->priority }}</td>
                                                <td>{{ $experience->is_exclusive }}</td>

                                                <td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>
                    <div class="card mt-5">
                        <div class="card-header">
                            <div class="float-left">
                                <span class="card-title">{{ __('Show') }} Studies</span>
                            </div>
                            <div class="float-right">
                                <a href="{{ route('joboffers.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                            </div>
                            </div>
                        <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                        <tr>
                                            <th>No</th>
                                            <th>Recruiter Rut</th>
                                            <th>Description</th>
                                            <th>Position</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jobOffer->requirements_json['studies'] as $studies)
                                            <tr>
                                                
                                                <td>{{ $studies->requirements }}</td>
                                                <td>{{ $studies->skill_level }}</td>
                                                <td>{{ $studies->priority }}</td>
                                                <td>{{ $studies->is_exclusive }}</td>

                                                <td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>


            </div>
        </div>
    </section>
@endsection

