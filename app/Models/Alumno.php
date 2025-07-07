<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Alumno extends Authenticatable
{
    use Notifiable;

    protected $table = 'alumnos';

    protected $fillable = ['nombre', 'email', 'password'];

    protected $hidden = ['password'];

    // Relación con entregas
    public function entregas()
    {
        return $this->hasMany(Entrega::class, 'alumno_id');
    }
}
