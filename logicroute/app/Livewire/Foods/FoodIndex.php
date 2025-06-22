<?php

namespace App\Livewire\Foods;

use Livewire\Component;
use App\Models\Food;
use Livewire\Attributes\On;

class FoodIndex extends Component
{
    public $foods;

    public function mount()
    {
        $this->foods = Food::all();
    }

    #[On('deleteFood')]
    public function delete($id = null)
    {
        // dd('Entro a la función delete:', $id);

        try {

            $food = Food::find($id);

            if ($food) {
                $food->delete();
                $this->foods = Food::all(); // Actualizar la lista de alimentos
            }

            $this->dispatch('deleteSuccess');
        } catch (\Exception $e) {

            // Manejar la excepción, por ejemplo, registrarla o mostrar un mensaje de error
            //dd($e->getMessage());
            $this->dispatch('deleteError');
        }
    }


    public function render()
    {
        return view('livewire.foods.food-index');
    }
}
