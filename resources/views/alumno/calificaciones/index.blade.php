@extends('layouts.alumno')

@section('title', 'Mis Calificaciones')

@section('content')


@if($entregas->isEmpty())
    <p class="text-gray-700">No hay calificaciones disponibles aún.</p>
@else
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 rounded-lg">
            <thead class="bg-gradient-to-r from-green-800 to-green-600 text-white">
                <tr>
                    <th class="px-4 py-2 text-left">Título de la Tarea</th>
                    <th class="px-4 py-2 text-left">Descripción</th>
                    <th class="px-4 py-2 text-left">Calificación</th>
                </tr>
            </thead>
            <tbody>
                @foreach($entregas as $entrega)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="px-4 py-2">{{ $entrega->tarea->titulo }}</td>
                        <td class="px-4 py-2">{{ $entrega->tarea->descripcion ?? 'Sin descripción' }}</td>
                        <td class="px-4 py-2">
                            @if($entrega->calificacion !== null)
                                <span class="font-bold text-green-700">{{ $entrega->calificacion }}/10</span>
                            @else
                                <span class="text-gray-500">Sin calificar</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
@endsection
