<?php

namespace App\Http\Controllers\Profesor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tarea;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TareaController extends Controller
{
    // Mostrar listado de tareas del profesor autenticado
    public function index()
    {
        $tareas = Tarea::where('profesor_id', Auth::id())->get();
        return view('profesor.tareas.index', compact('tareas'));
    }

    // Mostrar formulario para crear tarea
    public function create()
    {
        return view('profesor.tareas.create');
    }

    // Guardar nueva tarea en la base
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_limite' => 'required|date',
            'archivo' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $archivoNombre = null;
        if ($request->hasFile('archivo')) {
            // Guardar en disco público para que sea accesible via /storage
            $archivoNombre = $request->file('archivo')->store('tareas', 'public');
        }

        Tarea::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'fecha_limite' => $request->fecha_limite,
            'archivo' => $archivoNombre,
            'profesor_id' => Auth::id(),
        ]);

        return redirect()->route('profesor.tareas.index')->with('success', 'Tarea creada correctamente.');
    }

    // Mostrar formulario para editar tarea
    public function edit(Tarea $tarea)
    {
        // Validar que el profesor sea dueño de la tarea
        if ($tarea->profesor_id !== Auth::id()) {
            abort(403);
        }

        return view('profesor.tareas.edit', compact('tarea'));
    }

    // Actualizar tarea
    public function update(Request $request, Tarea $tarea)
    {
        // Validar que el profesor sea dueño de la tarea
        if ($tarea->profesor_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_limite' => 'required|date',
            'archivo' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        if ($request->hasFile('archivo')) {
            // Borrar archivo anterior si existe en disco público
            if ($tarea->archivo) {
                Storage::disk('public')->delete($tarea->archivo);
            }
            // Guardar nuevo archivo
            $archivoNombre = $request->file('archivo')->store('tareas', 'public');
            $tarea->archivo = $archivoNombre;
        }

        $tarea->titulo = $request->titulo;
        $tarea->descripcion = $request->descripcion;
        $tarea->fecha_limite = $request->fecha_limite;
        $tarea->save();

        return redirect()->route('profesor.tareas.index')->with('success', 'Tarea actualizada correctamente.');
    }

    // Eliminar tarea
    public function destroy(Tarea $tarea)
    {
        // Validar que el profesor sea dueño de la tarea
        if ($tarea->profesor_id !== Auth::id()) {
            abort(403);
        }

        if ($tarea->archivo) {
            Storage::disk('public')->delete($tarea->archivo);
        }
        $tarea->delete();

        return redirect()->route('profesor.tareas.index')->with('success', 'Tarea eliminada correctamente.');
    }

    // Ver entregas de una tarea (opcional)
    public function verEntregas(Tarea $tarea)
    {
        // Validar que el profesor sea dueño de la tarea
        if ($tarea->profesor_id !== Auth::id()) {
            abort(403);
        }

        $entregas = $tarea->entregas; // Asumiendo relación entregas() en el modelo Tarea
        return view('profesor.tareas.entregas', compact('tarea', 'entregas'));
    }
}
