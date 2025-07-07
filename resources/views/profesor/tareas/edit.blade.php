@extends('layouts.profesor')

@section('title', 'Editar Tarea')

@section('content')
    <h2>Editar tarea</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('profesor.tareas.update', $tarea->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="titulo">Título:</label><br>
        <input type="text" name="titulo" id="titulo" value="{{ old('titulo', $tarea->titulo) }}" required><br><br>

        <label for="descripcion">Descripción:</label><br>
        <textarea name="descripcion" id="descripcion">{{ old('descripcion', $tarea->descripcion) }}</textarea><br><br>

        <label for="fecha_limite">Fecha límite:</label><br>
        <input type="date" name="fecha_limite" id="fecha_limite" value="{{ old('fecha_limite', $tarea->fecha_limite->format('Y-m-d')) }}" required><br><br>

        <label for="archivo">Archivo (PDF, DOC, DOCX):</label><br>
        @if($tarea->archivo)
            <p>Archivo actual: <a href="{{ Storage::url($tarea->archivo) }}" target="_blank">Ver archivo</a></p>
        @endif
        <input type="file" name="archivo" id="archivo" accept=".pdf,.doc,.docx"><br><br>

        <button type="submit">Actualizar tarea</button>
    </form>
@endsection

