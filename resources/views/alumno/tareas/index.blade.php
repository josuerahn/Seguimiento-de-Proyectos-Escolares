@extends('layouts.alumno')

@section('content')
    <h2 class="mb-4">📚 Tareas del profesor</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Fecha límite</th>
                <th>Archivo del profesor</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tareas as $tarea)
                @php
                    $entrega = $tarea->entregas->first();
                @endphp
                <tr>
                    <td>{{ $tarea->titulo }}</td>
                    <td>{{ $tarea->descripcion }}</td>
                    <td>{{ \Carbon\Carbon::parse($tarea->fecha_limite)->format('d/m/Y') }}</td>
                    <td>
                        @if($tarea->archivo)
                            <a href="{{ asset('storage/' . $tarea->archivo) }}" target="_blank" class="btn btn-sm btn-outline-primary">Descargar</a>
                        @else
                            No disponible
                        @endif
                    </td>
                    <td>
                        @if($entrega)
                            <span class="badge bg-success">Completada</span>
                        @elseif(\Carbon\Carbon::parse($tarea->fecha_limite)->isPast())
                            <span class="badge bg-danger">Vencida</span>
                        @else
                            <span class="badge bg-warning text-dark">Pendiente</span>
                        @endif
                    </td>
                    <td>
                        @if(!$entrega && !\Carbon\Carbon::parse($tarea->fecha_limite)->isPast())
                            <a href="{{ route('alumno.entregas.create', $tarea->id) }}" class="btn btn-sm btn-success">Subir mi tarea</a>
                        @elseif($entrega)
                            <a href="{{ asset('storage/' . $entrega->archivo) }}" target="_blank" class="btn btn-sm btn-secondary">Mi entrega</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
