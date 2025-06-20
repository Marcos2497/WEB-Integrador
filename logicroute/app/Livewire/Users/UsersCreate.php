<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Mail\NewUserRegisteredMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserCreate extends Component
{
    public $name;
    public $email;
    public $roleSelected;
    // Eliminamos las propiedades de contraseña ya que se generará automáticamente

    public function save()
    {
        try {
            DB::beginTransaction();

            $this->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'roleSelected' => 'required',
            ]);

            // Generar contraseña aleatoria segura
            $generatedPassword = Str::password(12); // Contraseña de 12 caracteres con mezcla de tipos

            // Crear el usuario
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => bcrypt($generatedPassword),
            ]);

            // Asignar el rol al usuario
            $user->assignRole($this->roleSelected);

            DB::commit();

            // Enviar correo con la contraseña generada
            if (User::where('email', $this->email)->exists()) {
                Mail::to($user->email)->send(new NewUserRegisteredMail($user, $generatedPassword));
            }

            $this->reset();
            $this->redirectRoute('users-users-index');
            
        } catch (\Exception $e) {
            DB::rollBack();
            $this->dispatch('alerta', [
                'tipo' => 'error', 
                'mensaje' => 'Error al guardar el usuario: ' . $e->getMessage()
            ]);
        }
    }

    public function render()
    {
        $roles = \Spatie\Permission\Models\Role::all();
        return view('livewire.users.users-create', compact('roles'));
    }
}