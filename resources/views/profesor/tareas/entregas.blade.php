@extends('layouts.profesor') {{-- O ajustá según tu layout base --}}

@section('title', 'Entregas de la Tarea')

@section('content')
    <h2>Entregas de la tarea: <strong>{{ $tarea->titulo }}</strong></h2>

    @if($entregas->isEmpty())
        <p>No hay entregas todavía.</p>
    @else
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>Alumno</th>
                    <th>Archivo</th>
                    <th>Fecha de Entrega</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($entregas as $entrega)
                    <tr>
                        <td>{{ $entrega->alumno->nombre ?? 'Desconocido' }}</td>

                        <td>
                            @if($entrega->archivo)
                                <a href="{{ asset('storage/' . $entrega->archivo) }}" target="_blank">Descargar</a>
                            @else
                                Sin archivo
                            @endif
                        </td>

                        <td>
                            {{-- Conversión segura con Carbon --}}
                            {{ \Carbon\Carbon::parse($entrega->fecha_entrega)->format('d/m/Y H:i') }}
                        </td>

                        <td>
                            {{-- Opcional: botón para eliminar o ver más --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
