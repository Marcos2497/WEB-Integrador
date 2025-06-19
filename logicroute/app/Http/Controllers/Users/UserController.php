<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
     public function roles_index()
    {
        return view('vistas_estaticas.usuario.roles-index');
    }

        public function users_index()
    {
        return view('vistas_estaticas.usuario.users-index');
    }

    public function users_create()
    {
        return view('vistas_estaticas.usuario.users-create');
    }

}

