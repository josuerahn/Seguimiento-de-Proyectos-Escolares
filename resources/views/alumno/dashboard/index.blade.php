@extends('layouts.alumno')

@section('title', 'Dashboard Alumno')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Bienvenido, {{ auth()->user()->nombre ?? 'Alumno' }}</h1>

    <div class="flex gap-4 mb-8">
        <div class="bg-green-100 p-4 rounded-lg text-center flex-1">
            <h3 class="text-lg font-bold text-green-700">✅ Completadas</h3>
            <p class="text-xl font-bold">{{ $completadas }}</p>
        </div>
        <div class="bg-yellow-100 p-4 rounded-lg text-center flex-1">
            <h3 class="text-lg font-bold text-yellow-700">🕒 Pendientes</h3>
            <p class="text-xl font-bold">{{ $pendientes }}</p>
        </div>
        <div class="bg-red-100 p-4 rounded-lg text-center flex-1">
            <h3 class="text-lg font-bold text-red-700">❌ Vencidas</h3>
            <p class="text-xl font-bold">{{ $vencidas }}</p>
        </div>
    </div>
@endsection
