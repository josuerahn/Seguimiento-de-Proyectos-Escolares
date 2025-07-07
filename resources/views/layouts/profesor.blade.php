<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Panel Profesor')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body class="flex min-h-screen bg-gradient-to-r from-purple-700 via-indigo-700 to-blue-700 text-white">

    <!-- Barra lateral -->
    <nav class="w-64 h-screen fixed left-0 top-0 bg-gradient-to-b from-purple-800 via-indigo-800 to-blue-800 p-6 flex flex-col justify-between shadow-xl z-20">
        
        <div>
            <h2 class="text-2xl font-bold mb-10 flex items-center gap-2">
                <i class="ri-user-line"></i> {{ Auth::guard('profesor')->user()->nombre }}
            </h2>

            <nav class="space-y-4">
                <a href="{{ route('profesor.dashboard') }}" class="flex items-center gap-2 bg-purple-500 text-white px-4 py-2 rounded-lg text-center hover:bg-purple-600 font-bold transition">
                    <i class="ri-dashboard-line"></i> Inicio
                </a>
                <a href="{{ route('profesor.tareas.create') }}" class="flex items-center gap-2 bg-purple-500 text-white px-4 py-2 rounded-lg text-center hover:bg-purple-600 font-bold transition">
                    <i class="ri-file-add-line"></i> Crear Tarea
                </a>
                <a href="{{ route('profesor.tareas.index') }}" class="flex items-center gap-2 bg-purple-500 text-white px-4 py-2 rounded-lg text-center hover:bg-purple-600 font-bold transition">
                    <i class="ri-list-check"></i> Lista de Tareas
                </a>
                <form action="{{ route('profesor.logout') }}" method="POST" class="mt-2">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-2 bg-red-500 hover:bg-red-600 px-4 py-2 rounded-lg font-bold text-white transition">
                        <i class="ri-logout-box-r-line"></i> Cerrar sesión
                    </button>
                </form>
            </nav>
        </div>

    </nav>

    <!-- Contenido principal -->
    <main class="flex-grow p-8 bg-gray-50 text-black overflow-y-auto ml-64">
    
    <header class="bg-gradient-to-r from-purple-800 to-blue-800 p-5 rounded-xl shadow-lg mb-8 text-white flex items-center justify-between">
        <h1 class="text-3xl font-bold flex items-center gap-2">
            <i class="ri-folder-line"></i> @yield('title')
        </h1>
    </header>

    <div class="space-y-6">
        @yield('content')
    </div>

    </main>

</body>
</html>
