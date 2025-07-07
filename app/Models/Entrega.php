<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Entrega extends Model
{
    use HasFactory;

    // Campos que pueden ser asignados en masa
    protected $fillable = [
        'tarea_id',
        'alumno_id',
        'archivo',
        'fecha_entrega',
        'calificacion',
    ];

    // Cast automático para fechas
    protected $casts = [
        'fecha_entrega' => 'datetime',
    ];

    // Relación: una entrega pertenece a una tarea
    public function tarea()
    {
        return $this->belongsTo(Tarea::class);
    }

    // Relación: una entrega pertenece a un alumno
    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }
}
