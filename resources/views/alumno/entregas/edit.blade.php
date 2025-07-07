@extends('layouts.alumno')

@section('title', 'Editar Entrega')

@section('content')
    <h2>Editar entrega para la tarea: {{ $entrega->tarea->titulo }}</h2>

    <form action="{{ route('alumno.entregas.update', $entrega->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Mostrar el archivo actual --}}
        <p>Archivo actual:
            @if ($entrega->archivo)
                <a href="{{ asset('storage/' . $entrega->archivo) }}" target="_blank">Ver archivo</a>
            @else
                No hay archivo subido
            @endif
        </p>

        <div>
            <label for="archivo">Cambiar archivo (opcional):</label>
            <input type="file" name="archivo" id="archivo">
            <small>Si no quieres cambiar el archivo, deja este campo vacío.</small>
        </div>

        <div>
            <label for="comentarios">Comentarios:</label>
            <textarea name="comentarios" id="comentarios">{{ old('comentarios', $entrega->comentarios) }}</textarea>
        </div>

        <button type="submit">Actualizar entrega</button>
    </form>
@endsection
