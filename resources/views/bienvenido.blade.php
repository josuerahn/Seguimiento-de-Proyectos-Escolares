<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <title>Gestión Escolar</title>
</head>
<body class="bg-gray-100 text-gray-800">

<!-- Navbar -->
<nav class="bg-gradient-to-r from-violet-700 via-purple-700 to-blue-700 text-white flex items-center justify-between px-4 py-3">
    <a href="#" class="text-2xl font-bold"><span class="text-violet-400">Gestión</span>Escolar</a>
    <div class="space-x-2 hidden md:flex">
        <a href="{{ route('profesor.login') }}" class="bg-violet-400 text-white-700 px-3 py-1 rounded hover:bg-green-300 font-semibold">Ingresar como Profesor</a>
        <a href="{{ route('alumno.login') }}" class="bg-violet-400 text-white-700 px-3 py-1 rounded hover:bg-green-300 font-semibold">Ingresar como Alumno</a>
        <a href="#about" class="bg-violet-400 text-white-700 px-3 py-1 rounded hover:bg-green-300 font-semibold">Sobre Nosotros</a>
        <a href="#team" class="bg-violet-400 text-white-700 px-3 py-1 rounded hover:bg-green-300 font-semibold">Equipo</a>
    </div>
</nav>


<!-- Header -->
<header class="container mx-auto flex flex-col md:flex-row items-center py-16 px-4">
    <div class="md:w-1/2 space-y-6">
    <h1 class="text-4xl font-bold">
        Organizá tu Escuela<br>
        <span class="bg-gradient-to-r from-purple-600 via-indigo-500 to-blue-600 bg-clip-text text-transparent">
            Gestión Eficiente
        </span>
        al Alcance
    </h1>
    <p>Nuestra plataforma simplifica la gestión de proyectos escolares, facilita la comunicación y permite que alumnos y docentes se enfoquen en lo más importante: aprender y enseñar.</p>
    <button class="bg-gradient-to-r from-purple-600 via-indigo-500 to-blue-600 text-white px-4 py-2 rounded font-bold hover:opacity-90">
    Conocé más
</button>
    </div>
    <div class="md:w-1/2 mt-10 md:mt-0 flex justify-center">
        <img src="{{ asset('img/enseñando.jpg') }}" alt="Equipo" class="rounded-full shadow-lg w-[300px] h-[200px] object-cover">
    </div>
</header>

<!-- Sobre Nosotros -->
<section id="about" class="container mx-auto py-16 px-4 flex flex-col md:flex-row items-center bg-gradient-to-r from-purple-700 via-indigo-700 to-blue-700 rounded-lg shadow-lg text-white">
    <div class="md:w-1/2 space-y-6">
        <h2 class="text-3xl font-bold mb-4 text-yellow-400">Sobre Nosotros</h2>
        <p>En <strong>Gestión Escolar</strong>, impulsamos el orden y la eficiencia en las instituciones educativas. Ofrecemos herramientas digitales para organizar proyectos, tareas y actividades escolares, conectando docentes, alumnos y familias en un mismo espacio.</p>
        <ul class="list-disc list-inside text-white">
            <li>Facilitamos la organización institucional</li>
            <li>Mejoramos la comunicación educativa</li>
            <li>Optimizamos la gestión de proyectos escolares</li>
        </ul>
    </div>
    <div class="md:w-1/2 mt-10 md:mt-0 flex justify-center">
        <img src="{{ asset('img/pizarra.jpg') }}" alt="Equipo" class="rounded-lg shadow-lg w-[300px] h-[200px] object-cover">
    </div>
</section>

<!-- Servicios -->
<section id="service" class="container mx-auto py-16 px-4 text-white">
    <h2 class="text-3xl font-bold mb-8 text-center bg-gradient-to-r from-purple-600 via-indigo-500 to-blue-600 bg-clip-text text-transparent">Nuestros Servicios</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <div class="bg-gradient-to-r from-purple-700 via-indigo-700 to-blue-700 shadow-lg p-6 rounded text-center hover:scale-105 transform transition">
            <i class="ri-file-list-3-line text-5xl text-yellow-400 mb-4"></i>
            <h4 class="font-bold text-lg mb-2">Gestión de Proyectos</h4>
            <p>Organizá y hacé seguimiento de los proyectos escolares de manera simple y eficiente.</p>
        </div>
        
        <div class="bg-gradient-to-r from-purple-700 via-indigo-700 to-blue-700 shadow-lg p-6 rounded text-center hover:scale-105 transform transition">
            <i class="ri-group-line text-5xl text-yellow-400 mb-4"></i>
            <h4 class="font-bold text-lg mb-2">Conexión entre Docentes y Alumnos</h4>
            <p>Fomentá la comunicación y colaboración en el entorno educativo.</p>
        </div>
        
        <div class="bg-gradient-to-r from-purple-700 via-indigo-700 to-blue-700 shadow-lg p-6 rounded text-center hover:scale-105 transform transition">
            <i class="ri-calendar-check-line text-5xl text-yellow-400 mb-4"></i>
            <h4 class="font-bold text-lg mb-2">Planificación de Actividades</h4>
            <p>Agenda institucional, recordatorios y eventos escolares en un solo lugar.</p>
        </div>

    </div>
</section>

<!-- Acerca del Equipo -->
<section id="team" class="container mx-auto py-16 px-4 text-white">
    <h2 class="text-3xl font-bold mb-8 text-center bg-gradient-to-r from-purple-600 via-indigo-500 to-blue-600 bg-clip-text text-transparent">
        Acerca del Equipo
    </h2>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <div class="bg-gradient-to-r from-purple-700 via-indigo-700 to-blue-700 shadow-lg p-6 rounded text-center hover:scale-105 transform transition">
            <img src="{{ asset('img/josue.jpeg') }}" alt="Integrante" class="mx-auto w-24 h-24 rounded-full mb-4 border-4 border-yellow-400">
            <h4 class="font-bold text-lg mb-2">Josue Rahn</h4>
            <p>Programador Backend</p>
        </div>
        
        <div class="bg-gradient-to-r from-purple-700 via-indigo-700 to-blue-700 shadow-lg p-6 rounded text-center hover:scale-105 transform transition">
            <img src="{{ asset('img/elias.jpeg') }}" alt="Integrante" class="mx-auto w-24 h-24 rounded-full mb-4 border-4 border-yellow-400">
            <h4 class="font-bold text-lg mb-2">Elias Benitez</h4>
            <p>Programador Frontend</p>
        </div>
        
        <div class="bg-gradient-to-r from-purple-700 via-indigo-700 to-blue-700 shadow-lg p-6 rounded text-center hover:scale-105 transform transition">
            <img src="{{ asset('img/estefi.jpeg') }}" alt="Integrante" class="mx-auto w-24 h-24 rounded-full mb-4 border-4 border-yellow-400">
            <h4 class="font-bold text-lg mb-2">Montiel Estefania</h4>
            <p>Programador Backend</p>
        </div>
        
        <div class="bg-gradient-to-r from-purple-700 via-indigo-700 to-blue-700 shadow-lg p-6 rounded text-center hover:scale-105 transform transition">
            <img src="{{ asset('img/file.jpg') }}" alt="Integrante" class="mx-auto w-24 h-24 rounded-full mb-4 border-4 border-yellow-400">
            <h4 class="font-bold text-lg mb-2">Ortiz Cristian</h4>
            <p>Programador Frontend</p>
        </div>
        
        <div class="bg-gradient-to-r from-purple-700 via-indigo-700 to-blue-700 shadow-lg p-6 rounded text-center hover:scale-105 transform transition">
            <img src="{{ asset('img/ale.jpeg') }}" alt="Integrante" class="mx-auto w-24 h-24 rounded-full mb-4 border-4 border-yellow-400">
            <h4 class="font-bold text-lg mb-2">Pintos Alejandro</h4>
            <p>Programador Frontend</p>
        </div>

    </div>
</section>


<!-- Contacto -->
<section id="contact" class="container mx-auto py-16 px-4 text-center text-white">
    <div class="text-5xl font-bold mb-4 bg-gradient-to-r from-purple-600 via-indigo-500 to-blue-600 bg-clip-text text-transparent">GE</div>
    <h2 class="text-3xl font-bold mb-4 bg-gradient-to-r from-purple-600 via-indigo-500 to-blue-600 bg-clip-text text-transparent">¿Hablemos sobre tu escuela?</h2>
    <p class="mb-6 text-black">Estamos para ayudarte a transformar la gestión escolar. Contactanos para conocer nuestras soluciones.</p>
    <div class="flex justify-center space-x-4 text-3xl">
        <a href="#" class="text-black hover:text-yellow-400"><i class="ri-mail-line"></i></a>
        <a href="#" class="text-black hover:text-yellow-400"><i class="ri-whatsapp-line"></i></a>
        <a href="#" class="text-black hover:text-yellow-400"><i class="ri-global-line"></i></a>
    </div>
</section>


<!-- Footer -->
<footer class="bg-gradient-to-r from-purple-800 to-blue-800 text-white text-center py-4">
    © 2025 Gestión Escolar. Todos los derechos reservados.
</footer>


</body>
</html>
