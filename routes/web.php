<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegistroAlumnoController;
use App\Http\Controllers\Auth\LoginAlumnoController;
use App\Http\Controllers\Alumno\DashboardAlumnoController;
use App\Http\Controllers\Alumno\TareaController as AlumnoTareaController;
use App\Http\Controllers\Alumno\EntregaController as AlumnoEntregaController;

use App\Http\Controllers\Auth\RegistroProfesorController;
use App\Http\Controllers\Auth\LoginProfesorController;
use App\Http\Controllers\Profesor\DashboardProfesorController;
use App\Http\Controllers\Profesor\EntregaProfesorController;
use App\Http\Controllers\Profesor\TareaController as ProfesorTareaController;

// Ruta pública principal (welcome)
Route::get('/', function () {
    return view('bienvenido');
})->name('bienvenido');
// si no esta autenticado: 
Route::get('/login', function () {
    return redirect()->route('bienvenido');
})->name('login');
/*
|--------------------------------------------------------------------------
| RUTAS ALUMNO
|--------------------------------------------------------------------------
/*
|--------------------------------------------------------------------------
| RUTAS ALUMNO
|--------------------------------------------------------------------------
*/
Route::prefix('alumno')->name('alumno.')->group(function () {

    // Registro alumno
    Route::get('register', [RegistroAlumnoController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegistroAlumnoController::class, 'register']);

    // Login alumno
    Route::get('login', [LoginAlumnoController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginAlumnoController::class, 'login']);

    // Rutas protegidas alumno
    Route::middleware('auth:alumno')->group(function () {

        // Logout alumno
        Route::post('logout', [LoginAlumnoController::class, 'logout'])->name('logout');

        // Dashboard alumno
        Route::get('dashboard', [DashboardAlumnoController::class, 'index'])->name('dashboard');

        // Listado de tareas alumno
        Route::get('tareas', [AlumnoTareaController::class, 'index'])->name('tareas.index');

        // CRUD entregas alumno
        Route::get('entregas/create/{tarea}', [AlumnoEntregaController::class, 'create'])->name('entregas.create');
        Route::post('entregas', [AlumnoEntregaController::class, 'store'])->name('entregas.store');
        Route::get('entregas/{entrega}/edit', [AlumnoEntregaController::class, 'edit'])->name('entregas.edit');
        Route::put('entregas/{entrega}', [AlumnoEntregaController::class, 'update'])->name('entregas.update');
        Route::delete('entregas/{entrega}', [AlumnoEntregaController::class, 'destroy'])->name('entregas.destroy');

        // ✅ Ruta para ver calificaciones
        Route::get('calificaciones', [AlumnoEntregaController::class, 'verCalificaciones'])->name('calificaciones');
    });
});

/*
|--------------------------------------------------------------------------
| RUTAS PROFESOR
|--------------------------------------------------------------------------
*/
Route::prefix('profesor')->name('profesor.')->group(function () {

    // Registro profesor
    Route::get('register', [RegistroProfesorController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegistroProfesorController::class, 'register']);

    // Login profesor
    Route::get('login', [LoginProfesorController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginProfesorController::class, 'login']);

    Route::middleware('auth:profesor')->group(function () {

        // Logout profesor
        Route::post('logout', [LoginProfesorController::class, 'logout'])->name('logout');

        // Dashboard
        Route::get('dashboard', [DashboardProfesorController::class, 'index'])->name('dashboard');

        // CRUD tareas
        Route::resource('tareas', ProfesorTareaController::class)->except(['show']);

        // ✅ Ruta para ver entregas de una tarea (debe estar dentro)
        Route::get('tareas/{tarea}/entregas', [ProfesorTareaController::class, 'verEntregas'])
            ->name('tareas.entregas');
    });
});
Route::put('entregas/{entrega}/calificar', [EntregaProfesorController::class, 'calificar'])->name('profesor.entregas.calificar');
Route::get('calificaciones', [App\Http\Controllers\Alumno\EntregaController::class, 'verCalificaciones'])->name('calificaciones');
