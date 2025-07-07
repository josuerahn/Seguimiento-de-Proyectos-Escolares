@extends('layouts.profesor')

@section('title', 'Entregas de la tarea')

@section('content')
    <h2>Entregas de: {{ $tarea->titulo }}</h2>

    @if($tarea->entregas->count())
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>Alumno</th>
                    <th>Archivo</th>
                    <th>Fecha de entrega</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tarea->entregas as $entrega)
                    <tr>
                        <td>{{ $entrega->alumno->nombre }}</td>
                        <td>
                            <a href="{{ Storage::url($entrega->archivo) }}" target="_blank">Ver archivo</a>
                        </td>
                        <td>{{ $entrega->fecha_entrega->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Aún no hay entregas para esta tarea.</p>
    @endif
@endsection
