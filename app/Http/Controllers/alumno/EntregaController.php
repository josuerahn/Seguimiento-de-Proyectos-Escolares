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
            'archivo' => 'required|file|mimes:pdf,doc,docx|max:10240', // 10MB
        ]);

        // Subir archivo al disco 'public'
        $archivoNombre = $request->file('archivo')->store('entregas', 'public');

        // Crear o actualizar entrega
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

        // Borrar archivo anterior si existe
        if ($entrega->archivo) {
            Storage::disk('public')->delete($entrega->archivo);
        }

        // Subir nuevo archivo
        $archivoNombre = $request->file('archivo')->store('entregas', 'public');

        // Guardar cambios
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
}
