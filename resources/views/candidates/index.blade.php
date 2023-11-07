<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Puntuación</th>
            <!-- Otros campos relevantes -->
        </tr>
    </thead>
    <tbody>
        @foreach ($candidates as $candidate)
            <tr>
                <td>{{ $candidate->nombre }}</td>
                <td>{{ $candidate->score }}</td>
                <!-- Otros campos relevantes -->
            </tr>
        @endforeach
    </tbody>
</table>