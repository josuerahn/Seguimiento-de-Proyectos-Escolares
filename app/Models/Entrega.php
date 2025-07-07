<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Entrega extends Model
{
    use HasFactory;

    // Campos asignables
    protected $fillable = [
        'tarea_id',
        'alumno_id',
        'archivo',
        'fecha_entrega',
    ];

    // ✅ Cast para que 'fecha_entrega' sea un objeto Carbon automáticamente
    protected $casts = [
        'fecha_entrega' => 'datetime',
    ];

    // Relación con la tarea
    public function tarea()
    {
        return $this->belongsTo(Tarea::class, 'tarea_id');
    }

    // Relación con el alumno
    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'alumno_id');
    }
}
