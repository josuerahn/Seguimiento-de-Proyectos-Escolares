<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login Profesor</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="m-0 p-0 h-screen overflow-hidden bg-gray-50 font-sans">
    <div class="fixed inset-0 w-full h-full flex items-center justify-center bg-cover bg-center"
        style="background-image: url('/img/login.jpg');">

        <!-- Overlay oscuro -->
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>

        <!-- Contenedor del formulario -->
        <div
            class="w-[500px] p-10 bg-white rounded-2xl shadow-xl z-10 relative transform transition duration-300 ease-in-out hover:-translate-y-1 hover:shadow-2xl">
            <!-- Icono de usuario -->
           <div class="w-24 h-24 mx-auto mb-6">
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Profesor"
                class="w-full h-full object-cover rounded-full shadow-lg animate-bounce" />
        </div>

            <form method="POST" action="{{ route('profesor.login') }}">
                @csrf
                <!-- Campo de email -->
                <div class="mb-6">
                    <label for="email" class="block mb-2 font-semibold text-gray-700">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none transition"
                        placeholder="Ingresa el email" required autofocus />
                </div>

                <!-- Campo de contraseña -->
                <div class="mb-6">
                    <label for="password" class="block mb-2 font-semibold text-gray-700">Contraseña</label>
                    <div class="relative">
                        <input type="password" id="password" name="password"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none transition"
                            placeholder="Ingresa la contraseña" required />
                        <span class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 cursor-pointer"
                            id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>

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
            <div class="mt-5 text-center text-gray-700">
                ¿No tienes cuenta?
                <a href="{{ route('profesor.register') }}"
                    class="text-blue-500 font-semibold hover:text-blue-700 hover:underline transition">
                    Regístrate aquí
                </a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const togglePassword = document.getElementById('togglePassword');
            const password = document.getElementById('password');

            togglePassword.addEventListener('click', function () {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);

                this.innerHTML = type === 'password' ?
                    '<i class="fas fa-eye"></i>' :
                    '<i class="fas fa-eye-slash"></i>';
            });
        });
    </script>
</body>

</html>
