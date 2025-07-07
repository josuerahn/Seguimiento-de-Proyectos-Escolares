@extends('layouts.alumno')

@section('content')
    <h1>Bienvenido, {{ auth()->user()->nombre ?? 'Alumno' }}</h1>

    <div style="display: flex; gap: 20px; margin-bottom: 30px;">
        <div style="background: #e0ffe0; padding: 15px; border-radius: 10px;">
            <h3>✅ Completadas</h3>
            <p>{{ $completadas }}</p>
        </div>
        <div style="background: #fffacc; padding: 15px; border-radius: 10px;">
            <h3>🕒 Pendientes</h3>
            <p>{{ $pendientes }}</p>
        </div>
        <div style="background: #ffe0e0; padding: 15px; border-radius: 10px;">
            <h3>❌ Vencidas</h3>
            <p>{{ $vencidas }}</p>
        </div>
    </div>

    {{-- Resto del contenido: listado de tareas --}}
    {{-- ... --}}
@endsection
