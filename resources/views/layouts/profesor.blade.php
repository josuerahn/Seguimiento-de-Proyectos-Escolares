<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Panel Profesor')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex min-h-screen bg-gradient-to-r from-purple-700 via-indigo-700 to-blue-700 text-white">

    <!-- Barra lateral -->
    <nav class="w-60 bg-gradient-to-b from-purple-800 via-indigo-800 to-blue-800 p-6 flex flex-col justify-between">
        
        <div>
            <h2 class="text-xl font-bold mb-8">Bienvenido, {{ Auth::guard('profesor')->user()->nombre }}</h2>

            <a href="{{ route('profesor.dashboard') }}" class="block mb-4 bg-yellow-400 text-purple-900 px-3 py-2 rounded text-center hover:bg-yellow-300 font-semibold">Inicio</a>
            <a href="{{ route('profesor.tareas.create') }}" class="block mb-4 bg-yellow-400 text-purple-900 px-3 py-2 rounded text-center hover:bg-yellow-300 font-semibold">Crear Tarea</a>
            <a href="{{ route('profesor.tareas.index') }}" class="block mb-4 bg-yellow-400 text-purple-900 px-3 py-2 rounded text-center hover:bg-yellow-300 font-semibold">Lista de Tareas</a>
        </div>

        <form action="{{ route('profesor.logout') }}" method="POST">
            @csrf
            <button type="submit" class="w-full bg-red-500 hover:bg-red-600 px-3 py-2 rounded font-bold text-white">Cerrar sesión</button>
        </form>
        
    </nav>

    <!-- Contenido principal -->
    <main class="flex-grow p-6 bg-white text-black">
    
    <header class="bg-gradient-to-r from-purple-800 to-blue-800 p-4 rounded shadow mb-6 text-white">
        <h1 class="text-2xl font-bold">@yield('title')</h1>
    </header>

    @yield('content')

</main>

</body>
</html>
