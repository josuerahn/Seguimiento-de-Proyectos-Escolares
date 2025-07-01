<!-- resources/views/components/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>PRACTICA LIVEWIRE</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
</head>
<body class="bg-gray-100 min-h-screen flex">
<div class="max-w-2xl mx-auto mt-10 p-6 bg-white shadow rounded">
    <h1 class="text-2xl font-bold mb-6 text-center">Bienvenido, Profesor</h1>
    <div class="bg-gray-100 rounded-lg p-4">
        <h2 class="text-lg font-semibold mb-4">Panel de Control</h2>
        <ul class="space-y-3">
            <li>
                <button class="w-full text-left px-4 py-2 bg-blue-100 rounded hover:bg-blue-200 transition">Mis Cursos</button>
            </li>
            <li>
                <button class="w-full text-left px-4 py-2 bg-blue-100 rounded hover:bg-blue-200 transition">Lista de Alumnos</button>
            </li>
            <li>
                <button class="w-full text-left px-4 py-2 bg-blue-100 rounded hover:bg-blue-200 transition">Gestionar Tareas</button>
            </li>
            <li>
                <form method="POST" action="{{ route('profesor.logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 bg-red-100 rounded hover:bg-red-200 transition">
                        Cerrar Sesión
                    </button>
                </form>
            </li>
        </ul>
    </div>
</div>
    @livewireScripts
</body>
</html>