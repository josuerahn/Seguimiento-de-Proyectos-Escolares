@extends('layouts.profesor')

@section('content')
<div class="p-6 bg-white shadow-lg rounded-lg">

    <h1 class="text-2xl font-bold mb-6 text-purple-700">Mis Tareas</h1>

    <div class="mb-6 text-right">
        <a href="{{ route('profesor.tareas.create') }}" class="bg-gradient-to-r from-purple-600 via-indigo-500 to-blue-600 text-white px-4 py-2 rounded font-bold hover:opacity-90">
            + Crear nueva tarea
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4 border-2 border-green-400">
            {{ session('success') }}
        </div>
    @endif

    @if($tareas->isEmpty())
        <p class="text-gray-700">No hay tareas aún.</p>
    @else
        <div class="space-y-4">
            @foreach ($tareas as $tarea)
                <div class="p-4 bg-gradient-to-r from-purple-100 to-blue-100 rounded shadow flex flex-col md:flex-row md:items-center md:justify-between">
                    
                    <p class="text-gray-700">
    Fecha límite: {{ \Carbon\Carbon::parse($tarea->fecha_limite)->format('d/m/Y') }}
</p>

                    <div class="mt-4 md:mt-0 flex space-x-2">
                        <a href="{{ route('profesor.tareas.edit', $tarea) }}" class="bg-yellow-400 text-purple-900 px-3 py-1 rounded font-semibold hover:bg-yellow-300">Editar</a>
                        
                        <form action="{{ route('profesor.tareas.destroy', $tarea) }}" method="POST" onsubmit="return confirm('¿Seguro que quieres eliminar esta tarea?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded font-semibold hover:bg-red-600">Eliminar</button>
                        </form>

                        <a href="{{ route('profesor.tareas.entregas', $tarea) }}" class="bg-gradient-to-r from-purple-600 via-indigo-500 to-blue-600 text-white px-3 py-1 rounded font-semibold hover:opacity-90">Ver entregas</a>
                    </div>

                </div>
            @endforeach
        </div>
    @endif

</div>
@endsection
