@extends('layouts.alumno')

@section('content')
    <h1>Subir entrega para: {{ $tarea->titulo }}</h1>

    <form action="{{ route('alumno.entregas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="tarea_id" value="{{ $tarea->id }}">

        <label for="archivo">Archivo (PDF/DOC):</label>
        <input type="file" name="archivo" required>

        <button type="submit">Enviar tarea</button>
    </form>
@endsection
