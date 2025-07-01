@extends('components.layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Bienvenido, Alumno</h1>
        <p class="mb-4">Este es tu panel de alumno.</p>
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Tu Panel de Control</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="{{ route('alumno.cursos') }}">Mis Cursos</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('alumno.tareas') }}">Tareas Pendientes</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('alumno.perfil') }}">Mi Perfil</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection