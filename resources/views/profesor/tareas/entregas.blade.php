@extends('layouts.profesor')

@section('title', 'Entregas de la Tarea')

@section('content')
<div class="p-6 bg-white shadow-lg rounded-lg">

    <h2 class="text-2xl font-bold mb-4 text-purple-700">Entregas de la tarea: <strong>{{ $tarea->titulo }}</strong></h2>

    @if($entregas->isEmpty())
        <p class="text-gray-700">No hay entregas todavía.</p>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg">
                <thead class="bg-gradient-to-r from-purple-700 via-indigo-700 to-blue-700 text-white">
                    <tr>
                        <th class="px-4 py-2 text-left">Alumno</th>
                        <th class="px-4 py-2 text-left">Archivo</th>
                        <th class="px-4 py-2 text-left">Fecha de Entrega</th>
                        <th class="px-4 py-2 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($entregas as $entrega)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-4 py-2">{{ $entrega->alumno->nombre ?? 'Desconocido' }}</td>
                            <td class="px-4 py-2">
                                @if($entrega->archivo)
                                    <a href="{{ asset('storage/' . $entrega->archivo) }}" target="_blank" class="text-blue-600 hover:underline">Descargar</a>
                                @else
                                    <span class="text-gray-500">Sin archivo</span>
                                @endif
                            </td>
                            <td class="px-4 py-2">
                                {{ \Carbon\Carbon::parse($entrega->fecha_entrega)->format('d/m/Y H:i') }}
                            </td>
                            <td class="px-4 py-2">
                                {{-- Botones opcionales --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

</div>
@endsection
