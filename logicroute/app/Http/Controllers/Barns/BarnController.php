<?php

namespace App\Http\Controllers\Barns;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BarnController extends Controller
{
    // Mostrar la lista de galpones
    public function barns_index()
    {
        return view('vistas_estaticas.barn.barns-index');
    }

    // Mostrar el formulario para crear un nuevo galpon
    public function barns_create()
    {

        return view('vistas_estaticas.barn.barns-create');
    }

    // Mostrar el formulario para editar un galpon existente
    public function barns_edit($id)
    {
        return view('vistas_estaticas.barn.barns-edit', ['id' => $id]);
    }
}
