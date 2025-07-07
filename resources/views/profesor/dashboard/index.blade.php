@extends('layouts.profesor')

@section('title', 'Dashboard')

@section('content')
<div class="p-6 bg-white rounded shadow-lg">

    <h2 class="text-2xl font-bold mb-6 text-purple-700">Mis Tareas</h2>

    @if ($tareas->count())
        
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg">
                <thead class="bg-gradient-to-r from-purple-700 via-indigo-700 to-blue-700 text-white">
                    <tr>
                        <th class="px-4 py-2 text-left">Título</th>
                        <th class="px-4 py-2 text-left">Descripción</th>
                        <th class="px-4 py-2 text-left">Fecha límite</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tareas as $tarea)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-4 py-2">{{ $tarea->titulo }}</td>
                            <td class="px-4 py-2">{{ $tarea->descripcion }}</td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($tarea->fecha_limite)->format('d/m/Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    @else
        <p class="text-gray-700">No tenés tareas creadas aún.</p>
    @endif

</div>
@endsection
