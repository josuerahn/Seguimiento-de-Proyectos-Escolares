
@extends('layouts.alumno')

@section('title', 'Subir Trabajo')

@section('content')
<div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg">

    <h1 class="text-2xl font-bold mb-6 text-green-700 text-center">📤 Subir entrega para: <span class="text-black">{{ $tarea->titulo }}</span></h1>

    <form action="{{ route('alumno.entregas.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <input type="hidden" name="tarea_id" value="{{ $tarea->id }}">

        <div>
            <label for="archivo" class="block mb-1 font-semibold">Archivo (PDF/DOC):</label>
            <input type="file" name="archivo" id="archivo" required
                class="w-full border-2 border-green-500 rounded px-3 py-2 focus:outline-none focus:ring focus:border-green-700">
        </div>

        <div class="text-center">
            <button type="submit"
                class="bg-gradient-to-r from-green-600 via-green-500 to-green-400 text-white font-bold px-6 py-2 rounded hover:opacity-90">
                Enviar tarea
            </button>
        </div>
    </form>
</div>
@endsection
