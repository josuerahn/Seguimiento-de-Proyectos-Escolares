@extends('layouts.alumno')

@section('title', 'Dashboard')

@section('content')
    <h2>Tareas disponibles</h2>

    @if ($tareas->count())
        <ul>
            @foreach ($tareas as $tarea)
                <li>
                    <strong>{{ $tarea->titulo }}</strong> - Fecha límite: {{ \Carbon\Carbon::parse($tarea->fecha_limite)->format('d/m/Y') }}
                    <p>{{ $tarea->descripcion }}</p>
                </li>
            @endforeach
        </ul>
    @else
        <p>No hay tareas disponibles.</p>
    @endif
@endsection
