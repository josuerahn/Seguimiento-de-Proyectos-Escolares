@extends('layouts.profesor')

@section('title', 'Crear Tarea')

@section('content')
    <h2>Crear nueva tarea</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('profesor.tareas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="titulo">Título:</label><br>
        <input type="text" name="titulo" id="titulo" value="{{ old('titulo') }}" required><br><br>

        <label for="descripcion">Descripción:</label><br>
        <textarea name="descripcion" id="descripcion">{{ old('descripcion') }}</textarea><br><br>

        <label for="fecha_limite">Fecha límite:</label><br>
        <input type="date" name="fecha_limite" id="fecha_limite" value="{{ old('fecha_limite') }}" required><br><br>

        <label for="archivo">Archivo (PDF, DOC, DOCX):</label><br>
        <input type="file" name="archivo" id="archivo" accept=".pdf,.doc,.docx"><br><br>

        <button type="submit">Crear tarea</button>
    </form>
@endsection
