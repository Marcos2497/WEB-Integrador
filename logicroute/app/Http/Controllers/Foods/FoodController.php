<?php

namespace App\Http\Controllers\Foods;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    // Funcion que redirige a la vista estatica de alimentos
    public function foods_index()
    {
        return view('vistas_estaticas.food.foods-index');
    }

    public function foods_create()
    {
        return view('vistas_estaticas.food.foods-create');
    }

    public function foods_edit($id)
    {
        return view('vistas_estaticas.food.foods-edit', ['id' => $id]);
    }
    
    public function tipo_index()
    {
        return view('vistas_estaticas.food.tipo-index');
    }
}
