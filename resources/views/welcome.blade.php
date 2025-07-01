<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
</head>
<body>
    <h1>Bienvenido</h1>
    <a href="{{ route('landing.profesor') }}">
        <button>Profesor</button>
    </a>
    <a href="{{ route('landing.alumno') }}">
        <button>Alumno</button>
    </a>
</body>
</html>