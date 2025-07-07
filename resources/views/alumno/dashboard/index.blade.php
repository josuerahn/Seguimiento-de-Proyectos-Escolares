<!DOCTYPE html>
<html lang="es">

<<<<<<< HEAD
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard - Alumno</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        accent: "#4f46e5",
                        "accent-light": "#818cf8",
                        "accent-dark": "#3730a3",
                    },
                },
            },
        };
    </script>
</head>

<body class="min-h-screen flex bg-gradient-to-br from-gray-100 to-gray-200 font-sans">

    <!-- Sidebar -->
    <aside class="fixed inset-y-0 left-0 w-64 bg-white shadow-md border-r border-gray-200 flex flex-col">
        <div class="p-6 flex items-center space-x-3 border-b border-gray-200">
            <i class="fas fa-user-graduate text-3xl text-accent"></i>
            <h1 class="text-xl font-bold text-gray-900">Panel Alumno</h1>
        </div>

        <nav class="flex-1 p-6 space-y-4">
            <a href="#" class="flex items-center space-x-3 text-gray-700 hover:text-accent font-semibold">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
            <a href="#" class="flex items-center space-x-3 text-gray-700 hover:text-accent font-semibold">
                <i class="fas fa-tasks"></i>
                <span>Tareas</span>
            </a>
            <a href="#" class="flex items-center space-x-3 text-gray-700 hover:text-accent font-semibold">
                <i class="fas fa-calendar-alt"></i>
                <span>Eventos</span>
            </a>
            <a href="#" class="flex items-center space-x-3 text-gray-700 hover:text-accent font-semibold">
                <i class="fas fa-cog"></i>
                <span>Configuración</span>
            </a>
        </nav>

        <div class="p-6 border-t border-gray-200">
            <form method="POST" action="{{ route('profesor.logout') }}">
                @csrf
                <button type="submit"
                    class="w-full bg-red-500 hover:bg-red-600 text-white py-2 rounded-lg font-semibold transition">
                    Cerrar Sesión
                </button>
            </form>
        </div>
    </aside>

    <!-- Main content -->
    <main class="flex-1 ml-64 p-8 max-w-7xl mx-auto">

        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-8 md:mb-12">
            <div>
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">Panel del Alumno</h1>
                <p class="text-gray-600 mt-1">Bienvenido a tu espacio de aprendizaje</p>
            </div>
            <div class="mt-4 md:mt-0 flex items-center space-x-4">
                <div class="relative">
                    <div
                        class="absolute -top-1 -right-1 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs font-bold">
                        3</div>
                    <button
                        class="bg-white p-2 rounded-full shadow-sm text-gray-600 hover:text-accent transition-colors">
                        <i class="far fa-bell text-xl"></i>
                    </button>
                </div>
                <div class="flex items-center space-x-3 bg-white p-2 rounded-full shadow-sm">
                    <div
                        class="bg-gray-200 border-2 border-dashed rounded-xl w-10 h-10 flex items-center justify-center text-gray-400 font-bold">
                        {{ strtoupper(substr($alumno?->name ?? 'AL', 0, 2)) }}
                    </div>
                    <div>
                        <p class="font-medium text-gray-900">{{ $alumno?->name ?? 'Alumno' }}</p>
                        <p class="text-xs text-gray-500">Estudiante</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Welcome Banner -->
        <div
            class="bg-gradient-to-r from-accent to-accent-dark rounded-2xl p-6 mb-8 text-white flex flex-col md:flex-row justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold mb-2">¡Bienvenido, {{ $alumno?->name ?? 'Alumno' }}!</h2>
                <p class="opacity-90 max-w-2xl">Aquí puedes gestionar tus tareas, ver tu progreso y mantenerte al día con tus actividades académicas.</p>
            </div>
            <div class="mt-4 md:mt-0 relative">
                <div
                    class="w-24 h-24 rounded-full bg-white/20 flex items-center justify-center">
                    <i class="fas fa-graduation-cap text-4xl"></i>
                </div>
                <div
                    class="absolute -bottom-2 -right-2 bg-white text-accent-dark rounded-full p-2 shadow-lg">
                    <i class="fas fa-book text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Stats Cards Simplificada -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Tareas Totales -->
            <div
                class="bg-white rounded-xl p-6 relative overflow-hidden shadow-sm hover:shadow-lg transition-transform transform hover:-translate-y-1">
                <div class="absolute top-0 right-0 w-16 h-16 bg-blue-100 rounded-bl-full"></div>
                <div class="relative z-10">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-700 mb-1">Tareas Totales</h3>
                            <p class="text-3xl font-bold text-gray-900">{{ $tareas->count() }}</p>
                        </div>
                        <div
                            class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center">
                            <i class="fas fa-tasks text-xl text-blue-600"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="flex items-center text-sm text-gray-500">
                            <span class="mr-2"><i class="fas fa-arrow-up"></i> 0%</span>
                            <span>desde el mes pasado</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tareas Pendientes (ejemplo con 0) -->
            <div
                class="bg-white rounded-xl p-6 relative overflow-hidden shadow-sm hover:shadow-lg transition-transform transform hover:-translate-y-1">
                <div class="absolute top-0 right-0 w-16 h-16 bg-gray-100 rounded-bl-full"></div>
                <div class="relative z-10">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-700 mb-1">Pendientes</h3>
                            <p class="text-3xl font-bold text-gray-900">0</p>
                        </div>
                        <div
                            class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center">
                            <i class="fas fa-clock text-xl text-gray-600"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tareas Vencidas (ejemplo con 0) -->
            <div
                class="bg-white rounded-xl p-6 relative overflow-hidden shadow-sm hover:shadow-lg transition-transform transform hover:-translate-y-1">
                <div class="absolute top-0 right-0 w-16 h-16 bg-gray-100 rounded-bl-full"></div>
                <div class="relative z-10">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-700 mb-1">Vencidas</h3>
                            <p class="text-3xl font-bold text-gray-900">0</p>
                        </div>
                        <div
                            class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center">
                            <i class="fas fa-exclamation-circle text-xl text-gray-600"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Progress Section -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            <div class="lg:col-span-2 bg-white rounded-xl p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold text-gray-900">Tu progreso académico</h3>
                    <div class="flex space-x-2">
                        <button
                            class="px-3 py-1 text-sm bg-gray-100 rounded-lg text-gray-600 hover:bg-gray-200 transition">Semanal</button>
                        <button
                            class="px-3 py-1 text-sm bg-accent text-white rounded-lg hover:bg-accent-light transition">Mensual</button>
                    </div>
                </div>

                <div class="h-64">
                    <!-- Gráfico de progreso (simulado) -->
                    <div class="flex items-end h-48 space-x-2 mt-4">
                        <div class="flex flex-col items-center flex-1">
                            <div class="w-full bg-gray-200 rounded-t-md" style="height: 40%"></div>
                            <span class="text-xs text-gray-500 mt-1">Lun</span>
                        </div>
                        <div class="flex flex-col items-center flex-1">
                            <div class="w-full bg-accent-light rounded-t-md" style="height: 60%"></div>
                            <span class="text-xs text-gray-500 mt-1">Mar</span>
                        </div>
                        <div class="flex flex-col items-center flex-1">
                            <div class="w-full bg-accent rounded-t-md" style="height: 80%"></div>
                            <span class="text-xs text-gray-500 mt-1">Mié</span>
                        </div>
                        <div class="flex flex-col items-center flex-1">
                            <div class="w-full bg-accent-dark rounded-t-md" style="height: 90%"></div>
                            <span class="text-xs text-gray-500 mt-1">Jue</span>
                        </div>
                        <div class="flex flex-col items-center flex-1">
                            <div class="w-full bg-accent rounded-t-md" style="height: 70%"></div>
                            <span class="text-xs text-gray-500 mt-1">Vie</span>
                        </div>
                        <div class="flex flex-col items-center flex-1">
                            <div class="w-full bg-gray-200 rounded-t-md" style="height: 30%"></div>
                            <span class="text-xs text-gray-500 mt-1">Sáb</span>
                        </div>
                        <div class="flex flex-col items-center flex-1">
                            <div class="w-full bg-gray-200 rounded-t-md" style="height: 20%"></div>
                            <span class="text-xs text-gray-500 mt-1">Dom</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold text-gray-900">Próximos eventos</h3>
                    <button class="text-accent hover:text-accent-light transition-colors">
                        <i class="far fa-calendar-plus"></i>
                    </button>
                </div>

                <div class="space-y-4">
                    <div class="flex items-start">
                        <div
                            class="w-10 h-10 rounded-md bg-purple-100 flex items-center justify-center mr-3 flex-shrink-0">
                            <i class="fas fa-chalkboard text-purple-600"></i>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-900">Clase de Matemáticas</h4>
                            <p class="text-sm text-gray-500">Hoy, 10:00 AM - 11:30 AM</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div
                            class="w-10 h-10 rounded-md bg-blue-100 flex items-center justify-center mr-3 flex-shrink-0">
                            <i class="fas fa-book text-blue-600"></i>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-900">Entrega de Proyecto</h4>
                            <p class="text-sm text-gray-500">Mañana, 11:59 PM</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div
                            class="w-10 h-10 rounded-md bg-red-100 flex items-center justify-center mr-3 flex-shrink-0">
                            <i class="fas fa-flask text-red-600"></i>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-900">Laboratorio de Ciencias</h4>
                            <p class="text-sm text-gray-500">Miércoles, 2:00 PM - 4:00 PM</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div
                            class="w-10 h-10 rounded-md bg-green-100 flex items-center justify-center mr-3 flex-shrink-0">
                            <i class="fas fa-users text-green-600"></i>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-900">Reunión de Grupo</h4>
                            <p class="text-sm text-gray-500">Viernes, 4:00 PM - 5:30 PM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tareas asignadas -->
        <div class="bg-white rounded-xl p-6 mb-8">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-semibold text-gray-900 flex items-center">
                    <i class="fas fa-clipboard-list text-accent mr-3"></i>
                    Tareas asignadas
                </h3>
                <div class="flex space-x-2">
                    <button
                        class="px-3 py-1 text-sm bg-gray-100 rounded-lg text-gray-600 hover:bg-gray-200 transition">
                        <i class="fas fa-filter mr-1"></i> Filtrar
                    </button>
                    <button
                        class="px-3 py-1 text-sm bg-accent text-white rounded-lg hover:bg-accent-light transition">
                        <i class="fas fa-plus mr-1"></i> Nueva
                    </button>
                </div>
            </div>

            @if($tareas->isEmpty())
            <div class="text-center py-12">
                <div class="inline-block p-4 bg-gray-100 rounded-full mb-4">
                    <i class="fas fa-check-circle text-3xl text-gray-400"></i>
                </div>
                <h4 class="text-lg font-medium text-gray-900 mb-2">¡No tienes tareas asignadas!</h4>
                <p class="text-gray-600 max-w-md mx-auto">Parece que estás al día con todas tus tareas. ¡Buen trabajo!</p>
            </div>
            @else
            <div class="space-y-4">
                @foreach($tareas as $tarea)
                <div
                    class="bg-white border border-gray-200 rounded-lg p-5 shadow-sm hover:shadow-md transition cursor-pointer flex flex-col md:flex-row md:items-center justify-between">
                    <div class="mb-3 md:mb-0">
                        <div class="flex items-center space-x-3">
                            <div class="w-3 h-3 rounded-full bg-blue-500"></div>
                            <h4 class="font-bold text-gray-900 text-lg">{{ $tarea->titulo }}</h4>
                        </div>
                        <p class="text-gray-700 mt-2 ml-6">{{ $tarea->descripcion }}</p>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div
                            class="bg-blue-50 px-3 py-1 rounded-lg text-blue-700 font-medium flex items-center">
                            <i class="far fa-calendar mr-2"></i>
                            {{ \Carbon\Carbon::parse($tarea->fecha_entrega ?? $tarea->created_at)->format('d/m/Y') }}
                        </div>
                        <div
                            class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center hover:bg-gray-200 transition cursor-pointer">
                            <i class="fas fa-ellipsis-v text-gray-600"></i>
                        </div>
                    </div>
                    <div
                        class="mt-4 md:mt-0 flex items-center space-x-4 text-gray-500 text-sm md:ml-6">
                        <div class="flex items-center space-x-1">
                            <i class="far fa-user"></i>
                            <span>{{ $alumno?->name ?? 'Alumno' }}</span>
                        </div>
                        <div class="flex items-center space-x-1">
                            <i class="far fa-clock"></i>
                            <span>{{ \Carbon\Carbon::parse($tarea->created_at)->diffForHumans() }}</span>
                        </div>
                        <button
                            class="ml-auto px-3 py-1 bg-green-100 text-green-700 rounded-lg text-sm font-medium hover:bg-green-200 transition flex items-center space-x-1">
                            <i class="fas fa-paper-plane"></i>
                            <span>Entregar</span>
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
            @endif


        </div>

        <!-- Footer -->
        <div class="text-center text-gray-500 text-sm pt-6 border-t border-gray-200">
            <p>Sistema Académico v4.2 • © 2023 Universidad. Todos los derechos reservados.</p>
        </div>
    </main>

</body>

</html>
=======
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
>>>>>>> 173a1d047b8c09d43153cf4b940aa434242e91e7
