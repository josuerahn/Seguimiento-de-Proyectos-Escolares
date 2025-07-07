@extends('layouts.profesor')

@section('title', 'Crear Tarea')

@section('content')
<div class="flex justify-center">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg border-4 border-purple-700">

        <h2 class="text-2xl font-bold mb-6 text-center text-purple-700">Crear nueva tarea</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4 border-2 border-red-500">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('profesor.tareas.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label for="titulo" class="block mb-1 font-semibold">Título:</label>
                <input type="text" name="titulo" id="titulo" value="{{ old('titulo') }}" required
                    class="w-full border-2 border-purple-500 rounded px-3 py-2 focus:outline-none focus:ring focus:border-purple-700">
            </div>

            <div>
                <label for="descripcion" class="block mb-1 font-semibold">Descripción:</label>
                <textarea name="descripcion" id="descripcion" rows="4"
                    class="w-full border-2 border-purple-500 rounded px-3 py-2 focus:outline-none focus:ring focus:border-purple-700">{{ old('descripcion') }}</textarea>
            </div>

            <div>
                <label for="fecha_limite" class="block mb-1 font-semibold">Fecha límite:</label>
                <input type="date" name="fecha_limite" id="fecha_limite" value="{{ old('fecha_limite') }}" required
                    class="w-full border-2 border-purple-500 rounded px-3 py-2 focus:outline-none focus:ring focus:border-purple-700">
            </div>

            <div>
                <label for="archivo" class="block mb-1 font-semibold">Archivo (PDF, DOC, DOCX):</label>
                <input type="file" name="archivo" id="archivo" accept=".pdf,.doc,.docx"
                    class="w-full border-2 border-purple-500 rounded px-3 py-2">
            </div>

            <div class="text-center">
                <button type="submit"
                    class="bg-gradient-to-r from-purple-600 via-indigo-500 to-blue-600 text-white font-bold px-6 py-2 rounded hover:opacity-90">
                    Crear tarea
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
