<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Se esta llamabdo al seeder de roles
        $this->call(RoleSeeder::class);


        // Se siembra un usuario
        $usuario1 = User::create([
            'name' => 'Natanael',
            'email' => 'marcosnatad247@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        // Se asigna el rol de gerente al usuario 'Natanael'
        $usuario1->assignRole('gerente');

        // Se siembra un usuario 2
        $usuario2 = User::create([
            'name' => 'Rulo',
            'email' => 'ruloblack@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        // Se asigna el rol de secretario al usuario 'Rulo'
        $usuario2->assignRole('secretario');

        // Se siembra un usuario 3
        $usuario3 = User::create([
            'name' => 'Luis',
            'email' => 'luis@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        // Se asigna el rol de chofer al usuario 'Luis'
        $usuario3->assignRole('chofer');
    }
}
