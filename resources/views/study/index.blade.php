@extends('layouts.app')

@section('template_title')
    Study
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Study') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('studies.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>User Rut</th>
										<th>Universidad</th>
										<th>Titulo</th>
										<th>F Inicio</th>
										<th>F Fin</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($studies as $study)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $study->user_rut }}</td>
											<td>{{ $study->Universidad }}</td>
											<td>{{ $study->Titulo }}</td>
											<td>{{ $study->f_inicio }}</td>
											<td>{{ $study->f_fin }}</td>

                                            <td>
                                                <form action="{{ route('studies.destroy',$study->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('studies.show',$study->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('studies.edit',$study->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $studies->links() !!}
            </div>
        </div>
    </div>
@endsection
