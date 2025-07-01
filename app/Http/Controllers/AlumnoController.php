<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function dashboard()
    {
        $alumno = Auth::guard('alumno')->user();
        return view('alumno.dashboard', compact('alumno'));
    }
}
