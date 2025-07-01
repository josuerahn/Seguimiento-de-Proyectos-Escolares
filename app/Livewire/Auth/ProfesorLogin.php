<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use Livewire\Attributes\Layout;

#[Layout('components.layouts.guest')]

class ProfesorLogin extends Component
{
    public $email = '';
    public $password = '';

    public function login()
    {
        $credentials = $this->only('email', 'password');

        if (Auth::guard('profesor')->attempt($credentials)) {
            return redirect()->route('profesor.dashboard');
        }

        $this->addError('email', 'Credenciales inválidas.');
    }

    public function render()
    {
        return view('livewire.auth.profesorLogin');
    }
}