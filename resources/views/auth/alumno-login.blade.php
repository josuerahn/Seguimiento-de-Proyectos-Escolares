<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login Alumno</title>
</head>
<body>
    <h1>Login Alumno</h1>

    <form method="POST" action="{{ route('alumno.login') }}">
        @csrf

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ old('email') }}" required autofocus>
        @error('email') <div style="color:red;">{{ $message }}</div> @enderror
        <br><br>

        <label>Contraseña:</label><br>
        <input type="password" name="password" required>
        @error('password') <div style="color:red;">{{ $message }}</div> @enderror
        <br><br>

        <label>
            <input type="checkbox" name="remember"> Recordarme
        </label>
        <br><br>

        <button type="submit">Ingresar</button>
    </form>

    <p>¿No tenés cuenta? <a href="{{ route('alumno.register') }}">Registrate</a></p>
</body>
</html>
