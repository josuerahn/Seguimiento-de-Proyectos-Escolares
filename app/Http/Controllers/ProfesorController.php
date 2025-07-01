<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    public function dashboard()
    {
    // Verifica que el profesor esté autenticado
    // Si no está autenticado, redirige al login del profesor
    $profesor = Auth::guard('profesor')->user();
    if (!$profesor) {
        return redirect()->route('profesor.login');
    }
    return view('profesor.dashboard', compact('profesor'));

}
}