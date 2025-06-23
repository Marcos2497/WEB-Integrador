<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Se crea los roles
        $gerente = Role::create(['name' => 'gerente']);
        $secretario = Role::create(['name' => 'secretario']);
        $logitica = Role::create(['name' => 'logística']);
        $chofer = Role::create(['name' => 'chofer']);

        // Se crea los permisos
        $dashboard = Permission::create(['name' => 'dashboard', 'guard_name' => 'web']);
        $usuario = Permission::create(['name' => 'usuario', 'guard_name' => 'web']);
        $alimento = Permission::create(['name' => 'alimento', 'guard_name' => 'web']);
        $galpon = Permission::create(['name' => 'galpon', 'guard_name' => 'web']);

        // Se asigna los permisos a los roles
        $gerente->givePermissionTo($dashboard, $usuario);
        $secretario->givePermissionTo($dashboard, $alimento, $galpon);
        $logitica->givePermissionTo($dashboard);
        $chofer->givePermissionTo($dashboard);
    }
}
