<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Panel Alumno')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body class="flex min-h-screen bg-gradient-to-r from-green-700 via-green-600 to-green-500 text-white font-sans">

    <!-- Barra lateral -->
    <nav class="w-64 bg-gradient-to-b from-green-800 via-green-700 to-green-600 p-6 flex flex-col justify-between shadow-xl sticky top-0 h-screen">
        
        <div>
            <h2 class="text-2xl font-bold mb-4 flex items-center gap-2">
                <i class="ri-user-line"></i> Alumno
            </h2>
            <p class="mb-8 flex items-center gap-2">
                <i class="ri-user-smile-line"></i>
                {{ Auth::guard('alumno')->check() ? Auth::guard('alumno')->user()->nombre : 'Invitado' }}
            </p>

            <nav class="space-y-4">
                <a href="{{ route('alumno.dashboard') }}" class="flex items-center gap-2 bg-green-500 text-white px-4 py-2 rounded-lg text-center hover:bg-green-400 font-bold transition">
                    <i class="ri-dashboard-line"></i> Dashboard
                </a>
                <a href="{{ route('alumno.tareas.index') }}" class="flex items-center gap-2 bg-green-500 text-white px-4 py-2 rounded-lg text-center hover:bg-green-400 font-bold transition">
                    <i class="ri-file-list-3-line"></i> Tareas
                </a>
                <a href="{{ route('alumno.calificaciones') }}" class="flex items-center gap-2 bg-green-500 text-white px-4 py-2 rounded-lg text-center hover:bg-green-400 font-bold transition">
                    <i class="ri-bar-chart-line"></i> Calificaciones
                </a>
                <form action="{{ route('alumno.logout') }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-2 bg-red-500 hover:bg-red-600 px-4 py-2 rounded-lg font-bold text-white transition">
                        <i class="ri-logout-box-r-line"></i> Cerrar sesión
                    </button>
                </form>
            </nav>
        </div>

    </nav>

    <!-- Contenido principal -->
    <main class="flex-grow p-8 bg-gray-50 text-black overflow-y-auto">
    
    <header class="bg-gradient-to-r from-green-800 to-green-600 p-5 rounded-xl shadow-lg mb-8 text-white flex items-center justify-between">
        <h1 class="text-3xl font-bold flex items-center gap-2">
            <i class="ri-book-open-line"></i> @yield('title')
        </h1>
    </header>

    <div class="space-y-6">
        @yield('content')
    </div>

    </main>

</body>
</html>
