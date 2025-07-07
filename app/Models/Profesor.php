<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Profesor extends Authenticatable
{
    use Notifiable;

    protected $table = 'profesores';

    protected $fillable = ['nombre', 'email', 'password'];

    protected $hidden = ['password'];

    // Relación con tareas
    public function tareas()
    {
        return $this->hasMany(Tarea::class, 'profesor_id');
    }
}

