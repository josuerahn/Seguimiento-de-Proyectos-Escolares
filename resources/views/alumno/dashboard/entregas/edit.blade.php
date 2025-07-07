@extends('layouts.alumno')

@section('title', 'Editar Entrega')

@section('content')
    <h2>Editar entrega para: {{ $entrega->tarea->titulo }}</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('alumno.entregas.update', $entrega->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @if($entrega->archivo)
            <p>Archivo actual: <a href="{{ Storage::url($entrega->archivo) }}" target="_blank">Ver archivo</a></p>
        @endif

        <label for="archivo">Reemplazar archivo:</label><br>
        <input type="file" name="archivo" id="archivo" accept=".pdf,.doc,.docx" required><br><br>

        <button type="submit">Actualizar entrega</button>
    </form>
@endsection
