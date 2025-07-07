
@extends('layouts.alumno')

@section('title', 'Tareas del Profesor')

@section('content')


@if(session('success'))
    <div class="bg-green-100 text-green-700 p-4 rounded mb-4 border-2 border-green-400">
        {{ session('success') }}
    </div>
@endif

<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300 rounded-lg">
        <thead class="bg-gradient-to-r from-green-800 to-green-600 text-white">
            <tr>
                <th class="px-4 py-2 text-left">Título</th>
                <th class="px-4 py-2 text-left">Descripción</th>
                <th class="px-4 py-2 text-left">Fecha límite</th>
                <th class="px-4 py-2 text-left">Archivo del profesor</th>
                <th class="px-4 py-2 text-left">Estado</th>
                <th class="px-4 py-2 text-left">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tareas as $tarea)
                @php
                    $entrega = $tarea->entregas->first();
                @endphp
                <tr class="border-b hover:bg-gray-100">
                    <td class="px-4 py-2">{{ $tarea->titulo }}</td>
                    <td class="px-4 py-2">{{ $tarea->descripcion }}</td>
                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($tarea->fecha_limite)->format('d/m/Y') }}</td>
                    <td class="px-4 py-2">
                        @if($tarea->archivo)
                            <a href="{{ asset('storage/' . $tarea->archivo) }}" target="_blank" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm">Descargar</a>
                        @else
                            <span class="text-gray-500">No disponible</span>
                        @endif
                    </td>
                    <td class="px-4 py-2">
                        @if($entrega)
                            <span class="bg-green-200 text-green-800 px-2 py-1 rounded text-sm font-semibold">Completada</span>
                        @elseif(\Carbon\Carbon::parse($tarea->fecha_limite)->isPast())
                            <span class="bg-red-200 text-red-800 px-2 py-1 rounded text-sm font-semibold">Vencida</span>
                        @else
                            <span class="bg-yellow-200 text-yellow-800 px-2 py-1 rounded text-sm font-semibold">Pendiente</span>
                        @endif
                    </td>
                    <td class="px-4 py-2">
                        @if(!$entrega && !\Carbon\Carbon::parse($tarea->fecha_limite)->isPast())
                            <a href="{{ route('alumno.entregas.create', $tarea->id) }}" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-sm">Subir mi tarea</a>
                        @elseif($entrega)
                            <a href="{{ asset('storage/' . $entrega->archivo) }}" target="_blank" class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-1 rounded text-sm">Mi entrega</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
