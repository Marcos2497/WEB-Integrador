<?php

namespace App\Livewire\Barns;

use Livewire\Component;
use App\Models\Barn;
use App\Models\Infraestructura;
use App\Models\Tipo;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;

class BarnEdit extends Component
{
    public $barn;
    public $infraestructura;
    
    // Campos de Infraestructura
    public $nombre;
    public $capacidad_maxima;
    public $estado = 'Activo';
    public $latitude;
    public $longitude;
    
    public function mount($id)
    {
        $this->barn = Barn::with('infraestructura')->findOrFail($id);
        $this->infraestructura = $this->barn->infraestructura;
        
        // Rellenar campos
        $this->nombre = $this->infraestructura->nombre;
        $this->capacidad_maxima = $this->infraestructura->capacidad_maxima;
        $this->estado = $this->infraestructura->estado;
        $this->latitude = $this->infraestructura->latitude;
        $this->longitude = $this->infraestructura->longitude;
    }

    #[On('editBarn')]
    public function edit()
    {
        $this->validate([
            'nombre' => 'required|unique:infraestructuras,nombre,'.$this->infraestructura->id,
            'capacidad_maxima' => 'required|numeric|min:1',
            'estado' => 'required|in:Activo,Inactivo',
            'latitude' => 'required|between:-90,90|unique:infraestructuras,latitude,'.$this->infraestructura->id,
            'longitude' => 'required|between:-180,180|unique:infraestructuras,longitude,'.$this->infraestructura->id,
        ]);
        
        // Verificar que la capacidad máxima no sea menor que la capacidad ocupada
        $capacidad_ocupada = $this->infraestructura->capacidad_maxima - $this->infraestructura->capacidad_disponible;
        if ($this->capacidad_maxima < $capacidad_ocupada) {
            $this->dispatch('alerta', tipo: 'error', mensaje: 'La capacidad máxima no puede ser menor a la capacidad ocupada.');
            return;
        }

        DB::beginTransaction();
        try {
            // Actualizar Infraestructura
            $this->infraestructura->update([
                'nombre' => $this->nombre,
                'capacidad_maxima' => $this->capacidad_maxima,
                'estado' => $this->estado,
                'latitude' => $this->latitude,
                'longitude' => $this->longitude,
            ]);
            
            DB::commit();
            $this->dispatch('editSuccess');
        } catch (\Exception $e) {
            DB::rollBack();
            $this->dispatch('editError', message: $e->getMessage());
        }
    }

    #[On('editFinish')]
    public function editFinish()
    {
        return $this->redirect(route('barn-barns-index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.barns.barn-edit');
    }
}