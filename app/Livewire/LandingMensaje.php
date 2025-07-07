<?php

namespace App\Livewire;

use Livewire\Component;

class LandingMensaje extends Component
{
    public $mensaje = "Bienvenido a la plataforma";

    public function cambiarMensaje()
    {
        $mensajes = [
            "Comenzá a organizar tus tareas ahora mismo 📚",
            "Nunca fue tan fácil gestionar tu tiempo ⏰",
            "Tu progreso, en un solo lugar 📊",
            "Aprender nunca fue tan divertido 🎉"
        ];

        do {
            $nuevo = $mensajes[array_rand($mensajes)];
        } while ($nuevo === $this->mensaje);

        $this->mensaje = $nuevo;
    }

    public function render()
    {
        return view('livewire.landing-mensaje');
    }
}
