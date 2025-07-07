<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login Alumno</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body class="m-0 p-0 h-screen overflow-hidden bg-gray-50 font-sans">
    <div class="fixed inset-0 w-full h-full flex items-center justify-center bg-cover bg-center"
        style="background-image: url('https://images.unsplash.com/photo-1498243691581-b145c3f54a5a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');">
        <!-- Overlay oscuro -->
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>

        <!-- Contenedor del formulario -->
        <div
            class="w-[500px] p-10 bg-white rounded-2xl shadow-xl z-10 relative transform transition duration-300 ease-in-out hover:-translate-y-1 hover:shadow-2xl">
            <!-- Icono de usuario -->
            <div
                class="w-24 h-24 mx-auto mb-6 flex items-center justify-center text-white text-5xl rounded-full bg-gradient-to-br from-blue-500 to-blue-700 shadow-lg animate-bounce">
                <i class="fas fa-user-graduate"></i>
            </div>

            <form method="POST" action="{{ route('alumno.login') }}">
                @csrf

                <!-- Campo de email -->
                <div class="mb-6">
                    <label for="email" class="block mb-2 font-semibold text-gray-700">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none transition" 
                        placeholder="Ingresa el email">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo de contraseña -->
                <div class="mb-6">
                    <label for="password" class="block mb-2 font-semibold text-gray-700">Contraseña</label>
                    <div class="relative">
                        <input type="password" id="password" name="password" required
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none transition"
                            placeholder="Ingresa la contraseña">
                        <span class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 cursor-pointer"
                            id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Checkbox recordar -->
                <div class="mb-6 flex items-center space-x-2">
                    <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="remember" class="text-gray-700 font-medium select-none">Recordarme</label>
                </div>

                <!-- Botón de login -->
                <button type="submit"
                    class="w-full py-3.5 bg-gradient-to-r from-blue-500 to-blue-600 text-white font-semibold rounded-xl shadow-md hover:from-blue-600 hover:to-blue-700 transition duration-300 ease-in-out transform hover:-translate-y-0.5 hover:shadow-lg">
                    Iniciar Sesión
                </button>
            </form>

            <!-- Enlace de registro -->
            <p class="mt-5 text-center text-gray-700">
                ¿No tenés cuenta?
                <a href="{{ route('alumno.register') }}"
                    class="text-blue-500 font-semibold hover:text-blue-700 hover:underline transition">
                    Registrate aquí
                </a>
            </p>
        </div>
    </div>

    <script>
        // Toggle visibility contraseña
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = "password";
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    </script>
</body>

</html>
