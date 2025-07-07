<?php

namespace App\Http\Controllers\Alumno;

use App\Http\Controllers\Controller;
use App\Models\Entrega;
use App\Models\Tarea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EntregaController extends Controller
{
    // Mostrar formulario para crear entrega (subir archivo) de una tarea
    public function create(Tarea $tarea)
    {
        return view('alumno.entregas.create', compact('tarea'));
    }

    // Guardar entrega nueva
    public function store(Request $request)
    {
        $request->validate([
            'tarea_id' => 'required|exists:tareas,id',
            'archivo' => 'required|file|mimes:pdf,doc,docx,png|max:20240', // 10MB
        ]);

        $archivoOriginal = $request->file('archivo')->getClientOriginalName();
        $nombreArchivoConPrefijo = time() . '_' . $archivoOriginal;
        $archivoNombre = $request->file('archivo')->storeAs('entregas', $nombreArchivoConPrefijo, 'public');

        Entrega::updateOrCreate(
            [
                'tarea_id' => $request->tarea_id,
                'alumno_id' => Auth::guard('alumno')->id(),
            ],
            [
                'archivo' => $archivoNombre,
                'fecha_entrega' => now(),
            ]
        );

        return redirect()->route('alumno.dashboard')->with('success', 'Entrega realizada correctamente.');
    }

    // Mostrar formulario para editar entrega
    public function edit(Entrega $entrega)
    {
        if ($entrega->alumno_id !== Auth::guard('alumno')->id()) {
            abort(403);
        }

        return view('alumno.entregas.edit', compact('entrega'));
    }

    // Actualizar entrega existente
    public function update(Request $request, Entrega $entrega)
    {
        if ($entrega->alumno_id !== Auth::guard('alumno')->id()) {
            abort(403);
        }

        $request->validate([
            'archivo' => 'required|file|mimes:pdf,doc,docx|max:10240',
        ]);

        if ($entrega->archivo) {
            Storage::disk('public')->delete($entrega->archivo);
        }

        $archivoOriginal = $request->file('archivo')->getClientOriginalName();
        $nombreArchivoConPrefijo = time() . '_' . $archivoOriginal;
        $archivoNombre = $request->file('archivo')->storeAs('entregas', $nombreArchivoConPrefijo, 'public');

        $entrega->archivo = $archivoNombre;
        $entrega->fecha_entrega = now();
        $entrega->save();

        return redirect()->route('alumno.dashboard')->with('success', 'Entrega actualizada correctamente.');
    }

    // Eliminar entrega
    public function destroy(Entrega $entrega)
    {
        if ($entrega->alumno_id !== Auth::guard('alumno')->id()) {
            abort(403);
        }

        if ($entrega->archivo) {
            Storage::disk('public')->delete($entrega->archivo);
        }

        $entrega->delete();

        return redirect()->route('alumno.dashboard')->with('success', 'Entrega eliminada correctamente.');
    }

    // Mostrar calificaciones del alumno
    public function verCalificaciones()
    {
        $entregas = Entrega::with('tarea')
            ->where('alumno_id', Auth::guard('alumno')->id())
            ->whereNotNull('calificacion')
            ->get();

        return view('alumno.calificaciones.index', compact('entregas'));
    }
}
