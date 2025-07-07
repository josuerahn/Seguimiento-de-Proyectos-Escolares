<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $casts = [
        'fecha_limite' => 'datetime',
    ];
    protected $fillable = ['titulo', 'descripcion', 'archivo', 'fecha_limite', 'profesor_id'];

    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'profesor_id');
    }

    public function entregas()
    {
        return $this->hasMany(Entrega::class, 'tarea_id');
    }
}

