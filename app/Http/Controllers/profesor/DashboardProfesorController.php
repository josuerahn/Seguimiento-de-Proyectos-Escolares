<?php
namespace App\Http\Controllers\Profesor;

use App\Http\Controllers\Controller;
use App\Models\Tarea;
use Illuminate\Support\Facades\Auth;

class DashboardProfesorController extends Controller
{
    public function index()
    {
        $profesor = Auth::guard('profesor')->user();
        $tareas = Tarea::where('profesor_id', $profesor->id)->with('entregas')->get();

        
        return view('profesor.dashboard.index', compact('tareas'));
    }
}
