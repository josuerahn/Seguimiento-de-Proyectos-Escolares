<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @livewireStyles

    <title>Bienvenido - Gestión Escolar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        h1 {
            margin-bottom: 40px;
            color: #333;
        }
        .buttons {
            display: flex;
            gap: 20px;
        }
        a.btn {
            padding: 15px 30px;
            text-decoration: none;
            color: white;
            font-weight: bold;
            border-radius: 6px;
            transition: background-color 0.3s ease;
            box-shadow: 0 3px 6px rgba(0,0,0,0.1);
        }
        a.btn-alumno {
            background-color: #2d89ef;
        }
        a.btn-alumno:hover {
            background-color: #1b5fad;
        }
        a.btn-profesor {
            background-color: #f37021;
        }
        a.btn-profesor:hover {
            background-color: #b85213;
        }
    </style>
</head>
<body>
    <h1>Bienvenido a la Gestión Escolar</h1>
    <div class="buttons">
        <a href="{{ route('alumno.login') }}" class="btn btn-alumno">Ingresar como Alumno</a>
        <a href="{{ route('profesor.login') }}" class="btn btn-profesor">Ingresar como Profesor</a>
    </div>
    @livewireScripts
    <livewire:landing-mensaje />
</body>
</html>
