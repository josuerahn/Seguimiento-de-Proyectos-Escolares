<?php
namespace App\Http\Controllers\Alumno;
use App\Http\Controllers\Controller;
use App\Models\Tarea;
use App\Models\Entrega;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class DashboardAlumnoController extends Controller
{


    public function index()
    {
        $alumnoId = Auth::guard('alumno')->id();

        // Obtener todas las tareas con sus entregas
        $tareas = Tarea::with([
            'entregas' => function ($query) use ($alumnoId) {
                $query->where('alumno_id', $alumnoId);
            }
        ])->get();

        // Inicializar contadores
        $completadas = 0;
        $pendientes = 0;
        $vencidas = 0;

        foreach ($tareas as $tarea) {
            $entrega = $tarea->entregas->first(); // sólo 1 entrega por alumno por tarea

            if ($entrega) {
                $completadas++;
            } else {
                if (Carbon::parse($tarea->fecha_limite)->isPast()) {
                    $vencidas++;
                } else {
                    $pendientes++;
                }
            }
        }

        return view('alumno.dashboard.index', compact('tareas', 'completadas', 'pendientes', 'vencidas'));
    }

}
