@extends('layouts.profesor')

@section('title', 'Dashboard')

@section('content')
    <h2>Mis tareas</h2>

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
        <p>No tenés tareas creadas aún.</p>
    @endif
@endsection
