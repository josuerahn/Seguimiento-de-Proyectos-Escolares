@extends('layouts.alumno')

@section('title', 'Mis Calificaciones')

@section('content')
    <h2>📊 Calificaciones</h2>

    @if($entregas->isEmpty())
        <p>No hay calificaciones disponibles aún.</p>
    @else
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>Título de la Tarea</th>
                    <th>Descripción</th>
                    <th>Calificación</th>
                </tr>
            </thead>
            <tbody>
                @foreach($entregas as $entrega)
                    <tr>
                        <td>{{ $entrega->tarea->titulo }}</td>
                        <td>{{ $entrega->tarea->descripcion ?? 'Sin descripción' }}</td>
                        <td>
                            @if($entrega->calificacion !== null)
                                {{ $entrega->calificacion }}/10
                            @else
                                Sin calificar
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
