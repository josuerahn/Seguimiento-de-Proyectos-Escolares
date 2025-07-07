<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Panel Profesor')</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0; padding: 0;
            display: flex;
        }
        nav {
            width: 220px;
            background-color: #2c3e50;
            color: white;
            min-height: 100vh;
            padding: 20px;
            box-sizing: border-box;
        }
        nav a {
            color: white;
            text-decoration: none;
            display: block;
            margin-bottom: 15px;
            font-weight: bold;
        }
        nav a:hover {
            text-decoration: underline;
        }
        main {
            flex-grow: 1;
            padding: 20px;
        }
        header {
            background-color: #34495e;
            color: white;
            padding: 10px 20px;
        }
        .logout-form button {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            padding: 0;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <nav>
        <h2>Profesor</h2>
        <p>{{ Auth::guard('profesor')->user()->nombre }}</p>

        <a href="{{ route('profesor.dashboard') }}">Dashboard</a>
        <a href="{{ route('profesor.tareas.create') }}">Crear Tarea</a>
        <!-- Agregar más enlaces si se necesita -->

        <form action="{{ route('profesor.logout') }}" method="POST" class="logout-form">
            @csrf
            <button type="submit">Cerrar sesión</button>
        </form>
    </nav>

    <main>
        <header>
            <h1>@yield('title')</h1>
        </header>

        @yield('content')
    </main>

</body>
</html>
