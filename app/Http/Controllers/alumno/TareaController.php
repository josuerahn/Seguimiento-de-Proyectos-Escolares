<?php
namespace App\Http\Controllers\Alumno;

use App\Http\Controllers\Controller;
use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    public function index()
    {
        $tareas = Tarea::all(); // o las tareas específicas del alumno si tenés relación

        return view('alumno.tareas.index', compact('tareas'));
    }
}

