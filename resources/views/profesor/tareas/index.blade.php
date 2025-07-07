@extends('layouts.profesor')

@section('content')
    <h1>Mis Tareas</h1>

    <a href="{{ route('profesor.tareas.create') }}">Crear nueva tarea</a>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <ul>
        @forelse ($tareas as $tarea)
            <li>
                <strong>{{ $tarea->titulo }}</strong> (hasta {{ $tarea->fecha_limite }})<br>
                <a href="{{ route('profesor.tareas.edit', $tarea) }}">Editar</a> |
                <form action="{{ route('profesor.tareas.destroy', $tarea) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Seguro que quieres eliminar esta tarea?')">Eliminar</button>
                </form> |
                <a href="{{ route('profesor.tareas.entregas', $tarea) }}">Ver entregas</a>
            </li>
        @empty
            <p>No hay tareas aún.</p>
        @endforelse
    </ul>
@endsection
