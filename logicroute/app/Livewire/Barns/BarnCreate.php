<?php

namespace App\Livewire\Barns;

use Livewire\Component;
use App\Models\Barn;
use App\Models\Coordenada;
use App\Models\Infraestructura;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;

class BarnCreate extends Component
{

    //Estas son variables que se utilizan para almacenar los atributos del Infraetructura
    public $nombre, $capacidad_maxima, $capacidad_disponible, $estado = 'Activo', $latitude, $longitude;
    public $statusMessage = '';

    #[On('saveBarn')]
    public function save()
    {
        $validatedData = $this->validate([
            'latitude' => 'required|between:-90,90|unique:infraestructuras,latitude',
            'longitude' => 'required|between:-180,180|unique:infraestructuras,longitude',
            'nombre' => 'required|unique:infraestructuras,nombre',
            'capacidad_maxima' => 'required|numeric|min:1',
            'estado' => 'required',
        ]);

        DB::beginTransaction();

        try {
            // Crear el galpón asociado a la coordenada
            $infraestructura = Infraestructura::create([
                'nombre' => $this->nombre,
                'capacidad_maxima' => $this->capacidad_maxima,
                'capacidad_disponible' => $this->capacidad_maxima,
                'estado' => $this->estado,
                'latitude' => $this->latitude,
                'longitude' => $this->longitude,
            ]);

            //dd('Se creo la infraestructura');
            // Verifica que el galpón se haya creado correctamente
            if (!$infraestructura->id) {
                throw new \Exception('Error al crear el galpón');
            }

            // Crear el galpón
            $barn = Barn::create([
                'infraestructura_id' => $infraestructura->id,
            ]);

            //dd('Se creo el galpón');
            // Verifica que el galpón se haya creado correctamente
            if (!$barn->id) {
                throw new \Exception('Error al crear el galpón');
            }

            DB::commit();

            $this->dispatch('saveSuccess');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al guardar galpón: ' . $e->getMessage());
            $this->statusMessage = 'Ocurrió un error al guardar: ' . $e->getMessage();
        }
    }

    #[On('saveFinish')]
    public function saveFinish()
    {
        $this->reset();
        $this->redirectRoute('barn-barns-index');
    }

    #[On('saveAnother')]
    public function crearOtro()
    {
        $this->reset();
    }


    public function render()
    {
        return view('livewire.barns.barn-create');
    }
}
