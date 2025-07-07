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

        // Obtener todas las tareas (o las que correspondan a este alumno, según tu lógica)
        $tareas = Tarea::all();

        // PASAR variables necesarias a la vista
        return view('alumno.dashboard.index', [
            'alumno' => $alumno,
            'tareas' => $tareas,
            // No pases $tareasVigentes si no usás esa variable en la vista
        ]);
    }
}
