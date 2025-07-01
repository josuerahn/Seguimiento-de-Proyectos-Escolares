<!-- filepath: resources/views/livewire/auth/profesorRegister.blade.php -->
<div class="max-w-md mx-auto mt-10 p-6 bg-white shadow rounded">
    <h2 class="text-xl font-bold mb-4">Registro de Profesor</h2>
    <form wire:submit.prevent="register">
        <div class="mb-4">
            <label class="block mb-1">Nombre</label>
            <input type="text" wire:model="name" class="w-full border p-2 rounded">
            @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Email</label>
            <input type="email" wire:model="email" class="w-full border p-2 rounded">
            @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Contraseña</label>
            <input type="password" wire:model="password" class="w-full border p-2 rounded">
            @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Confirmar Contraseña</label>
            <input type="password" wire:model="password_confirmation" class="w-full border p-2 rounded">
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Registrarse</button>
    </form>
</div>