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
}
