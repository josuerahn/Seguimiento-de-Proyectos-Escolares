<?php
use App\Livewire\Auth\ProfesorLogin;
use App\Livewire\Auth\ProfesorRegister;
use App\Livewire\Auth\AlumnoLogin;
use App\Livewire\Auth\AlumnoRegister;

//ruta welcome 
Route::get('/', function () {
    return view('welcome');
})->name('welcome');
//RUTAS PROFESORES
Route::get('/profesor/login', ProfesorLogin::class)->name('profesor.login');
Route::get('/profesor/register', ProfesorRegister::class)->name('profesor.register');
Route::get('/profesor/dashboard', function () {
    return view('profesor.dashboard');
})->name('profesor.dashboard');
Route::post('/profesor/logout', function () {
    Auth::guard('profesor')->logout();
    return redirect()->route('profesor.login');
})->name('profesor.logout');

Route::get('/alumno/login', AlumnoLogin::class)->name('alumno.login');
Route::get('/alumno/register', AlumnoRegister::class)->name('alumno.register');
Route::get('/alumno/dashboard', function () {
    return view('alumno.dashboard');
})->name('alumno.dashboard');

Route::get('/profesor', function () {
    return view('landing.profesor');
})->name('landing.profesor');

Route::get('/alumno', function () {
    return view('landing.alumno');
})->name('landing.alumno');