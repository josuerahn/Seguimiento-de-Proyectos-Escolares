<!-- filepath: resources/views/landing_profesor.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido Profesor</title>
</head>
<body>
    <h2>Bienvenido Profesor</h2>
    <a href="{{ route('profesor.login') }}"><button>Iniciar Sesión</button></a>
    <a href="{{ route('profesor.register') }}"><button>Registrarse</button></a>
</body>
</html>