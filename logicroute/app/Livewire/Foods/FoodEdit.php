<?php

namespace App\Livewire\Foods;

use Livewire\Component;
use App\Models\Food;
use App\Models\Tipo;

class FoodEdit extends Component
{
    public $name;
    public $tipo_id;
    public $precio;
    public $duracion_dias;

    public $food;

    public function mount($id)
    {

        $this->food = Food::find($id);
        //Verifica si existe el registro   
        if ($this->food) {
            $this->name = $this->food->name;
            $this->tipo_id = $this->food->tipo_id;
            $this->precio = $this->food->precio;
            $this->duracion_dias = $this->food->duracion_dias;
        }
    }

    public function edit()
    {
        $this->validate([
            'name' => 'required',
            'tipo_id' => 'required|exists:tipos,id',
            'precio' => 'required|numeric|min:0',
            'duracion_dias' => 'nullable|numeric|min:0',
        ], [
            'name.required' => 'El campo nombre es obligatorio',
            'tipo_id.required' => 'El campo tipo es obligatorio',
            'tipo_id.exists' => 'El tipo seleccionado no es válido',
            'precio.required' => 'El campo precio es obligatorio',
            'precio.min' => 'El campo precio debe ser mayor a 0',
            'duracion_dias.min' => 'El campo duración debe ser mayor o igual a 0',
        ]);

        if ($this->food) {
            $this->food->name = $this->name;
            $this->food->tipo_id = $this->tipo_id; // ✅ CORRECTO
            $this->food->precio = $this->precio;
            $this->food->duracion_dias = $this->duracion_dias;
            $this->food->save();
        }

        $this->reset();
        return redirect()->route('food-foods-index');
    }



    public function render()
    {
        //obtener todos los tipos de alimentos
        $tipos = Tipo::all();
        return view('livewire.foods.food-edit', compact('tipos'));
    }
}
