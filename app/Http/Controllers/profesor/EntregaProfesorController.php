<?php
namespace App\Http\Controllers\Profesor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entrega;

class EntregaProfesorController extends Controller
{
    public function calificar(Request $request, Entrega $entrega)
    {
        $request->validate([
            'calificacion' => 'nullable|numeric|min:0|max:10',
        ]);

        $entrega->calificacion = $request->calificacion;
        $entrega->save();

        return back()->with('success', 'Calificación guardada correctamente.');
    }
}
