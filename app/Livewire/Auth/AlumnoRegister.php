<?php
namespace App\Livewire\Auth;
use App\Models\Alumno;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AlumnoRegister extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';

    public function register()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:alumnos',
            'password' => 'required|min:6|same:password_confirmation',
        ]);

        $alumno = Alumno::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        Auth::login($alumno);
        // Redirigir al dashboard del alumno
        return redirect()->route('alumno.dashboard');
    }

    public function render()
    {
        return view('livewire.auth.alumnoRegister')
            ->layout('components.layouts.guest');
    }
}
