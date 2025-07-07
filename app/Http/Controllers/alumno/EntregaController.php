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

    // Guardar entrega
    public function store(Request $request)
    {
        $request->validate([
            'tarea_id' => 'required|exists:tareas,id',
            'archivo' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $archivoNombre = $request->file('archivo')->store('entregas');

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

    // Opcional: editar entrega (ejemplo para reemplazar archivo)
    public function edit(Entrega $entrega)
    {
        // Verificar que sea del alumno logueado
        if ($entrega->alumno_id !== Auth::guard('alumno')->id()) {
            abort(403);
        }

        return view('alumno.entregas.edit', compact('entrega'));
    }

    public function update(Request $request, Entrega $entrega)
    {
        if ($entrega->alumno_id !== Auth::guard('alumno')->id()) {
            abort(403);
        }

        $request->validate([
            'archivo' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Borrar archivo viejo
        if ($entrega->archivo) {
            Storage::delete($entrega->archivo);
        }

        $archivoNombre = $request->file('archivo')->store('entregas');
        $entrega->archivo = $archivoNombre;
        $entrega->fecha_entrega = now();
        $entrega->save();

        return redirect()->route('alumno.dashboard')->with('success', 'Entrega actualizada correctamente.');
    }

    // Borrar entrega
    public function destroy(Entrega $entrega)
    {
        if ($entrega->alumno_id !== Auth::guard('alumno')->id()) {
            abort(403);
        }

        if ($entrega->archivo) {
            Storage::delete($entrega->archivo);
        }

        $entrega->delete();

        return redirect()->route('alumno.dashboard')->with('success', 'Entrega eliminada correctamente.');
    }
}
