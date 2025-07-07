<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Profesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegistroProfesorController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.profesor-register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:profesores',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $profesor = Profesor::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('profesor')->login($profesor);

        return redirect()->route('profesor.dashboard');
    }
}

