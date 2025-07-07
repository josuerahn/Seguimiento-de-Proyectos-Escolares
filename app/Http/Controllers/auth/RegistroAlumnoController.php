<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegistroAlumnoController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.alumno-register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:alumnos',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $alumno = Alumno::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('alumno')->login($alumno);

        return redirect()->route('alumno.dashboard');
    }
}
