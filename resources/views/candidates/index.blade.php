<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<nav>
    <nav class="text-enter">
        <h3>Lista de candidatos</h3>
    </nav>
    <nav>
        <nav>
            <nav>
                <nav>
                    <table class="table table-bordered border-primary">
                        <thead>
                            <tr>
                                <th>RUT</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Puntuación</th>
                                <!-- Otros campos relevantes -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($candidates as $candidate)
                            <tr>
                                <td>{{ $candidate->rut }}</td>
                                <td>{{ $candidate->nombre }}</td>
                                <td>{{ $candidate->apellido_paterno }}</td>
                                <td>{{ $candidate->score }}</td>
                                <!-- Otros campos relevantes -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </nav>
            </nav>
        </nav>
    </nav>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>