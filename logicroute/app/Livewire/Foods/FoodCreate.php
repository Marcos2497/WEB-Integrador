<?php

namespace App\Livewire\Foods;

use Livewire\Component;
use App\Models\Food;
use Illuminate\Support\Sleep;
use Livewire\Attributes\On;
use App\Models\Tipo;

class FoodCreate extends Component
{
    public $name;
    public $tipo_id;
    public $precio;
    public $duracion_dias;

    #[On('saveFood')] 
    public function save() {

        //dd($this->name, $this->tipo, $this->precio);

    $validatedData = $this->validate([
            'name' => 'required|unique:food,name',
            'tipo_id' => 'required',
            'precio' => 'required|numeric|min:1',
            'duracion_dias' => 'required|numeric|min:1',
        ],
    
        [
            'name.required' => 'El nombre del alimento es requerido.',
            'name.unique' => 'El nombre del alimento ya existe.',
            'tipo_id.required' => 'El tipo de alimento es requerido.',
            'precio.required' => 'El precio del alimento es requerido.',
            'precio.numeric' => 'El precio del alimento debe ser un número.',
            'precio.min' => 'El precio del alimento debe ser mayor a 0.',
            'duracion_dias.required' => 'La duración del alimento es requerida.',
            'duracion_dias.numeric' => 'La duración del alimento debe ser un número.',
            'duracion_dias.min' => 'La duración del alimento debe ser mayor a 0.',
        ]);

        //obtener el tipo de comida seleccionado
        $tipo = Tipo::find($this->tipo_id);
        
        try {
            //dd($validatedData);
            
            $food = Food::create([
            'name' => $this->name,
            'tipo_id' => $this->tipo_id,
            'precio' => $this->precio,
            'duracion_dias' => $this->duracion_dias,
            ]);
            
           $this->dispatch('saveSuccess');
           
            // $this->reset();
            // $this->redirectRoute('food-foods-index');

          

        } catch (\Exception $e) {
           
        }
    }
    #[On('saveFinish')]
    public function saveFinish()
    {
        $this->reset();
        $this->redirectRoute('food-foods-index');
    }
    #[On('saveAnother')]
    public function crearOtro()
    {
        $this->reset();
    }


    public function render()
    {
         $tipos = Tipo::all();
        return view('livewire.foods.food-create',compact('tipos'));
    }
}
