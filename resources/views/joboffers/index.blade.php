@extends('layouts.app')

@section('template_title')
    Job Offers
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Job offers') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('joboffers.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
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
                                    @foreach ($jobs as $jobs)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $jobs->user_rut }}</td>
											<td>{{ $jobs->descripcion }}</td>
											<td>{{ $jobs->puesto }}</td>

                                            <td>
                                                <form action="{{ route('joboffers.destroy',$jobs->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('joboffers.show',$jobs->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('joboffers.edit',$jobs->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
