<?php

namespace App\Livewire\Tipo;

use Livewire\Component;
use App\Models\Tipo;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;

class TipoIndex extends Component
{
    public $tipos, $nombre;

    public function mount()
    {
        $this->tipos = Tipo::all();
    }

    #[On('saveTipo')]
    public function save()
    {
           $validatedData = $this->validate([
            'nombre' => 'required|string|max:255',
           ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
           ]);

           DB::beginTransaction();
           try {
               Tipo::create([
                   'nombre' => $this->nombre,
               ]);
               DB::commit();
               $this->dispatch('saveSuccess');
              } catch (\Exception $e) {
                DB::rollBack();
              }

    }

    #[On('saveFinish')]
    public function saveFinish()
    {
        $this->reset();
        $this->redirect(route('food-tipo-index'));
    }

    #[On('deleteTipo')]
    public function delete($id = null)
    {
        try {
            $tipo = Tipo::find($id);
            if ($tipo) {
                $tipo->delete();
                $this->tipos = Tipo::all(); // Actualizar lista
            }

            $this->dispatch('deleteSuccess');

        } catch (\Exception $e) {
            $this->dispatch('deleteError');
        }
    }

    public function render()
    {
        return view('livewire.tipo.tipo-index');
    }
}
