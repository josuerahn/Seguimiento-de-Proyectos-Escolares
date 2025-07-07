@extends('layouts.profesor')

@section('title', 'Dashboard')

@section('content')

<!-- Main content -->
<main class="flex-1 ml-64 p-8 max-w-7xl mx-auto">

    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-8 md:mb-12">
        <div>
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">Panel del Profesor</h1>
            <p class="text-gray-600 mt-1">Gestión de tareas académicas</p>
        </div>
    </div>

    <!-- Welcome Banner -->
    <div class="bg-gradient-to-r from-accent to-accent-dark rounded-2xl p-6 mb-8 text-white">
        <h2 class="text-2xl font-bold mb-2">¡Bienvenido, {{ auth('profesor')->user()->name ?? 'Profesor' }}!</h2>
        <p class="opacity-90 max-w-2xl">Desde aquí puedes visualizar y gestionar las tareas asignadas a los estudiantes.</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div
            class="bg-white rounded-xl p-6 shadow-sm hover:shadow-lg transition-transform transform hover:-translate-y-1">
            <h3 class="text-lg font-semibold text-gray-700 mb-1">Tareas Totales</h3>
            <p class="text-3xl font-bold text-gray-900">{{ $tareas->count() }}</p>
        </div>
        <div
            class="bg-white rounded-xl p-6 shadow-sm hover:shadow-lg transition-transform transform hover:-translate-y-1">
            <h3 class="text-lg font-semibold text-gray-700 mb-1">Tareas Activas</h3>
            <p class="text-3xl font-bold text-gray-900">{{ $tareas->where('fecha_limite', '>=', now())->count() }}</p>
        </div>
        <div
            class="bg-white rounded-xl p-6 shadow-sm hover:shadow-lg transition-transform transform hover:-translate-y-1">
            <h3 class="text-lg font-semibold text-gray-700 mb-1">Tareas Vencidas</h3>
            <p class="text-3xl font-bold text-gray-900">{{ $tareas->where('fecha_limite', '<', now())->count() }}</p>
        </div>
    </div>

    <!-- Additional Stats -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div
            class="bg-white rounded-xl p-6 shadow-sm hover:shadow-lg transition-transform transform hover:-translate-y-1">
            <h3 class="text-lg font-semibold text-gray-700 mb-1">Nota Promedio</h3>
            <p class="text-3xl font-bold text-gray-900">--</p>
        </div>
        <div
            class="bg-white rounded-xl p-6 shadow-sm hover:shadow-lg transition-transform transform hover:-translate-y-1">
            <h3 class="text-lg font-semibold text-gray-700 mb-1">Nota más alta</h3>
            <p class="text-3xl font-bold text-gray-900">--</p>
        </div>
        <div
            class="bg-white rounded-xl p-6 shadow-sm hover:shadow-lg transition-transform transform hover:-translate-y-1">
            <h3 class="text-lg font-semibold text-gray-700 mb-1">Nota más baja</h3>
            <p class="text-3xl font-bold text-gray-900">--</p>
        </div>
        <div
            class="bg-white rounded-xl p-6 shadow-sm hover:shadow-lg transition-transform transform hover:-translate-y-1">
            <h3 class="text-lg font-semibold text-gray-700 mb-1">Evaluaciones Pendientes</h3>
            <p class="text-3xl font-bold text-gray-900">--</p>
        </div>
    </div>

    <!-- Tareas asignadas -->
    <div class="bg-white rounded-xl p-6">
        <h3 class="text-xl font-semibold text-gray-900 mb-6 flex items-center">
            <i class="fas fa-clipboard-list text-accent mr-3"></i>
            Tareas asignadas
        </h3>

        @if ($tareas->isEmpty())
        <div class="text-center py-12">
            <div class="inline-block p-4 bg-gray-100 rounded-full mb-4">
                <i class="fas fa-check-circle text-3xl text-gray-400"></i>
            </div>
            <h4 class="text-lg font-medium text-gray-900 mb-2">¡No hay tareas asignadas aún!</h4>
            <p class="text-gray-600 max-w-md mx-auto">Puedes crear nuevas tareas para los alumnos desde el panel de administración.</p>
        </div>
        @else
        <ul class="space-y-6">
            @foreach ($tareas as $tarea)
            <li class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                <div class="flex justify-between items-center mb-2">
                    <h3 class="text-xl font-semibold text-blue-700">{{ $tarea->titulo }}</h3>
                    <span class="text-sm text-gray-500">
                        Fecha límite: <time datetime="{{ $tarea->fecha_limite }}">{{ \Carbon\Carbon::parse($tarea->fecha_limite)->format('d/m/Y') }}</time>
                    </span>
                </div>
                <p class="text-gray-700 leading-relaxed">{{ $tarea->descripcion }}</p>
            </li>
            @endforeach
        </ul>
        @endif
    </div>

    <!-- Footer -->
    <div class="text-center text-gray-500 text-sm pt-6 border-t border-gray-200 mt-8">
        <p>Sistema Académico v4.2 • © 2023 Universidad. Todos los derechos reservados.</p>
    </div>

</main>

@endsection
