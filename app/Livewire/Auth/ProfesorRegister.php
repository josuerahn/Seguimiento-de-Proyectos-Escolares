<?php
namespace App\Livewire\Auth;
use App\Models\Profesor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfesorRegister extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';

    public function register()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:profesores',
            'password' => 'required|min:6|same:password_confirmation',
            
        ]);

        $profesor = Profesor::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        Auth::login($profesor);
        //redirigir al dashboard del profesor
        return redirect()->route('profesor.dashboard');
    }
    public function render()
    {
        return view('livewire.auth.profesorRegister')
            ->layout('components.layouts.guest');
    }
}
