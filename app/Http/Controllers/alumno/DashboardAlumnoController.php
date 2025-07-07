<?php
namespace App\Http\Controllers\Alumno;

use App\Http\Controllers\Controller;
use App\Models\Tarea;
use Illuminate\Support\Facades\Auth;

class DashboardAlumnoController extends Controller
{
    public function index()
    {
        $alumno = Auth::guard('alumno')->user();

        // Obtener las tareas del alumno, incluyendo las entregas
        $tareas = Tarea::with('entregas')->get();

        return view('alumno.dashboard.index', compact('tareas'));

    }
}
