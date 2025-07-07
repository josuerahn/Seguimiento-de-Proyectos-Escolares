<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro Alumno</title>
</head>
<body>
    <h1>Registro Alumno</h1>

    <form method="POST" action="{{ route('alumno.register') }}">
        @csrf

        <label>Nombre:</label><br>
        <input type="text" name="nombre" value="{{ old('nombre') }}" required autofocus>
        @error('nombre') <div style="color:red;">{{ $message }}</div> @enderror
        <br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ old('email') }}" required>
        @error('email') <div style="color:red;">{{ $message }}</div> @enderror
        <br><br>

        <label>Contraseña:</label><br>
        <input type="password" name="password" required>
        @error('password') <div style="color:red;">{{ $message }}</div> @enderror
        <br><br>

        <label>Confirmar Contraseña:</label><br>
        <input type="password" name="password_confirmation" required>
        <br><br>

        <button type="submit">Registrar</button>
    </form>

    <p>¿Ya tenés cuenta? <a href="{{ route('alumno.login') }}">Ingresar</a></p>
</body>
</html>
