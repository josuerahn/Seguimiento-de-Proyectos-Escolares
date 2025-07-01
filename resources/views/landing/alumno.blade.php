
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido Alumno</title>
</head>
<body>
    <h2>Bienvenido Alumno</h2>
    <a href="{{ route('alumno.login') }}"><button>Iniciar Sesión</button></a>
    <a href="{{ route('alumno.register') }}"><button>Registrarse</button></a>
</body>
</html>