<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Registro Profesor</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-100 flex items-center justify-center p-4">
 <div class="fixed inset-0 w-full h-full flex items-center justify-center bg-cover bg-center"
        style="background-image: url('https://images.unsplash.com/photo-1498243691581-b145c3f54a5a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8">
        <div class="w-24 h-24 mx-auto mb-6">
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Profesor"
                class="w-full h-full object-cover rounded-full shadow-lg animate-bounce" />
        </div>

        <form method="POST" action="{{ route('profesor.register') }}">
            @csrf

            <div class="mb-6">
                <label for="nombre" class="block mb-2 font-semibold text-gray-700">Nombre</label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" placeholder="Ingresa el nombre" required autofocus
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none transition" />
                @error('nombre')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="block mb-2 font-semibold text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Ingresa el email" required autofocus
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none transition" />
                @error('email')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="block mb-2 font-semibold text-gray-700">Contraseña</label>
                <input type="password" id="password" name="password" placeholder="Ingresa la contraseña" required autofocus
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none transition" />
                @error('password')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block mb-2 font-semibold text-gray-700">Confirmar Contraseña</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Ingresa la contraseña" required autofocus
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none transition" />
            </div>

            <button type="submit"
                class="w-full py-3.5 bg-gradient-to-r from-blue-500 to-blue-600 text-white font-semibold rounded-xl shadow-md hover:from-blue-600 hover:to-blue-700 transition duration-300 ease-in-out transform hover:-translate-y-0.5 hover:shadow-lg">
                Registrar
            </button>
        </form>

        <p class="mt-6 text-center text-gray-600">
            ¿Ya tenés cuenta?
            <a href="{{ route('profesor.login') }}" class="text-blue-600 hover:underline">Ingresar</a>
        </p>
    </div>

</body>
</html>
