<?php

namespace App\Http\Livewire;

use App\Models\Role;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Register extends Component
{
    public $roles = [];
    public $name, $email, $password, $password_confirmation, $role;

    public function mount()
    {
        $response = Http::get(url('/api/roles')); 
        $this->roles = $response->json();
    }

    public function register()
    {
        // Validación de los campos del formulario
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|exists:roles,id',
        ]);
    }

    public function render()
    {
        return view('livewire.register');
    }
}
