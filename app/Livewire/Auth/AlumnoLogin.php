<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use Livewire\Attributes\Layout;

#[Layout('components.layouts.guest')]

class AlumnoLogin extends Component
{
    public $email = '';
    public $password = '';

    public function login()
    {
        $credentials = $this->only('email', 'password');

        if (Auth::guard('alumno')->attempt($credentials)) {
            return redirect()->route('alumno.dashboard');
        }

        $this->addError('email', 'Credenciales inválidas.');
    }

    public function render()
    {
        return view('livewire.auth.alumnoLogin');
    }
}