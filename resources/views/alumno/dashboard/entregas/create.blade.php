@extends('layouts.alumno')

@section('title', 'Subir Entrega')

@section('content')
    <h2>Subir entrega para: {{ $tarea->titulo }}</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('alumno.entregas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="tarea_id" value="{{ $tarea->id }}">

        <label for="archivo">Archivo (PDF, DOC, DOCX):</label><br>
        <input type="file" name="archivo" id="archivo" accept=".pdf,.doc,.docx" required><br><br>

        <button type="submit">Subir entrega</button>
    </form>
@endsection
