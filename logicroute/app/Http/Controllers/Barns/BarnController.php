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

    
}
