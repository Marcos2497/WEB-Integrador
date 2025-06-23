<?php

namespace App\Livewire\Barns;

use Livewire\Component;
use App\Models\Barn;
use App\Models\Movimiento_s;
use App\Models\Stock;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use App\Models\Pedido;
use Illuminate\Support\Facades\DB;
class BarnIndex extends Component
{

    use WithPagination;

    #[Url]
    public $search = '';

    #[Url]
    public $disponible = '';

    #[Url]
    public $perPage = 10;

    #[On('deleteBarn')]
    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $barn = Barn::find($id);
            if ($barn) {
                $barn->delete();
                $this->dispatch('deleteSuccess');
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->dispatch('deleteError', $e->getMessage());
        }
    }

    public function resetPagination()
    {
        $this->resetPage();
    }

    public function render()
    {
            $barns = Barn::with('infraestructura')
            ->when($this->search, function ($query) {
                $query->whereHas('infraestructura', function ($query) {
                    $query->where('nombre', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->disponible !== null && $this->disponible !== '', function ($query) {
                $query->whereHas('infraestructura', function ($query) {
                    $query->where('capacidad_disponible', '>=', (float)$this->disponible);
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);
        return view('livewire.barns.barn-index', compact('barns'));
    }
}
