<?php

namespace App\Livewire\Users;

use Livewire\Component;
use Spatie\Permission\Models\Role; // Ensure you import the Role model
class RoleIndex extends Component
{
        public $roles;

    public function mount()
    {
        $this->roles = Role::all();
    }
    
    public function render()
    {
        return view('livewire.users.role-index');
    }
}
