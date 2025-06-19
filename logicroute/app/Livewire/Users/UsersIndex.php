<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;

class UsersIndex extends Component
{
    public $users;

    
    public function mount()
    {
        $this->users = User::all();
    }


    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        $this->users = User::all();
    }

    public function render()
    {
        //obtener todas las roles
        $roles = \Spatie\Permission\Models\Role::all();
        return view('livewire.users.users-index', compact('roles'));
    }


}
