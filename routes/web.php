<?php

use Illuminate\Support\Facades\Route;

// Controladores de autenticación Profesor
use App\Http\Controllers\Auth\RegistroProfesorController;
use App\Http\Controllers\Auth\LoginProfesorController;
use App\Http\Controllers\Profesor\DashboardProfesorController;
use App\Http\Controllers\Profesor\TareaController;

// Controladores de autenticación Alumno
use App\Http\Controllers\Auth\RegistroAlumnoController;
use App\Http\Controllers\Auth\LoginAlumnoController;
use App\Http\Controllers\Alumno\DashboardAlumnoController;
use App\Http\Controllers\Alumno\EntregaController;

/*
|--------------------------------------------------------------------------
| Rutas públicas
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('welcome');
// si no esta autenticado: 
Route::get('/login', function () {
    return redirect()->route('welcome');
})->name('login');
/*
|--------------------------------------------------------------------------
| Rutas Profesor
|--------------------------------------------------------------------------
*/
Route::prefix('profesor')->name('profesor.')->group(function () {

    // Registro
    Route::get('register', [RegistroProfesorController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegistroProfesorController::class, 'register']);

    // Login
    Route::get('login', [LoginProfesorController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginProfesorController::class, 'login']);

    // Rutas protegidas con middleware 'auth:profesor'
    Route::middleware('auth:profesor')->group(function () {

        Route::post('logout', [LoginProfesorController::class, 'logout'])->name('logout');

        Route::get('dashboard', [DashboardProfesorController::class, 'index'])->name('dashboard');

        // CRUD tareas
        Route::get('tareas/create', [TareaController::class, 'create'])->name('tareas.create');
        Route::post('tareas', [TareaController::class, 'store'])->name('tareas.store');
        Route::get('tareas/{tarea}/edit', [TareaController::class, 'edit'])->name('tareas.edit');
        Route::put('tareas/{tarea}', [TareaController::class, 'update'])->name('tareas.update');
        Route::delete('tareas/{tarea}', [TareaController::class, 'destroy'])->name('tareas.destroy');
        Route::get('tareas', [TareaController::class, 'index'])->name('tareas.index');

        // Ver entregas de tarea
        Route::get('tareas/{tarea}/entregas', [TareaController::class, 'verEntregas'])->name('tareas.entregas');
    });
});

/*
|--------------------------------------------------------------------------
| Rutas Alumno
|--------------------------------------------------------------------------
*/
Route::prefix('alumno')->name('alumno.')->group(function () {

    // Registro
    Route::get('register', [RegistroAlumnoController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegistroAlumnoController::class, 'register']);

    // Login
    Route::get('login', [LoginAlumnoController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginAlumnoController::class, 'login']);

    // Rutas protegidas con middleware 'auth:alumno'
    Route::middleware('auth:alumno')->group(function () {

        Route::post('logout', [LoginAlumnoController::class, 'logout'])->name('logout');

        Route::get('dashboard', [DashboardAlumnoController::class, 'index'])->name('dashboard');

        // CRUD entregas
        Route::get('entregas/create/{tarea}', [EntregaController::class, 'create'])->name('entregas.create');
        Route::post('entregas', [EntregaController::class, 'store'])->name('entregas.store');
        Route::get('entregas/{entrega}/edit', [EntregaController::class, 'edit'])->name('entregas.edit');
        Route::put('entregas/{entrega}', [EntregaController::class, 'update'])->name('entregas.update');
        Route::delete('entregas/{entrega}', [EntregaController::class, 'destroy'])->name('entregas.destroy');
    });
});
