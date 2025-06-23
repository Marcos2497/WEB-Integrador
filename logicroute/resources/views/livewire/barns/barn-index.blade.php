<div class="container mx-auto px-4 py-8">
    <!-- Botones y Selector de Items -->
    <div class="flex justify-between mb-6">
        <div class="flex items-center space-x-2">
            <span class="text-sm text-gray-700 font-medium">Mostrar:</span>
            <select wire:model.live="perPage" class="border border-gray-300 rounded-md px-2 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-200 w-16">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
            <span class="text-sm text-gray-700 font-medium">registros</span>
        </div>

        <div>
            <a href="{{ route('barn-barns-create') }}" class="bg-emerald-500 hover:bg-emerald-900 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105">
                Registrar Galpón
            </a>
        </div>
    </div>

    <!-- Filtros de Búsqueda -->
    <div class="bg-lime-200 p-4 rounded-lg shadow-md mb-6">
        <h2 class="text-xl font-semibold text-gray-900 mb-4">Filtros de Búsqueda</h2>
        <form>
            <div class="flex space-x-4">
                <div class="w-1/2">
                    <input type="text" wire:model.live="search" wire:click="resetPagination()" 
                        placeholder="Buscar por nombre..." 
                        class="focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm">
                </div>
                <div class="w-1/2">
                    <input type="text" wire:model.live="disponible" wire:click="resetPagination()" 
                        placeholder="Buscar disponibilidad (Kg)..." 
                        class="focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm">
                </div>
            </div>
        </form>
    </div>

    <!-- Tabla de Galpones -->
    <div class="overflow-x-auto bg-white rounded-lg shadow-md">
        <table class="w-full table-auto border-collapse">
            <thead class="bg-emerald-200 text-gray-900">
                <tr class="rounded-lg shadow-lg">
                    <th class="px-6 py-3 text-center text-xs font-bold uppercase">ID</th>
                    <th class="px-6 py-3 text-center text-xs font-bold uppercase">Nombre</th>
                    <th class="px-6 py-3 text-center text-xs font-bold uppercase">Capacidad Máxima (Kg)</th>
                    <th class="px-6 py-3 text-center text-xs font-bold uppercase">Capacidad Disponible (Kg)</th>
                    <th class="px-6 py-3 text-center text-xs font-bold uppercase">Estado</th>
                    <th class="px-6 py-3 text-center text-xs font-bold uppercase">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($barns as $barn)
                <tr wire:key="{{ $barn->id }}" class="border-b hover:bg-gray-100" data-barn-id="{{ $barn->id }}">
                    <td class="px-6 py-4 text-center text-sm font-medium text-gray-900">{{ $barn->id }}</td>
                    <td class="px-6 py-4 text-center text-sm text-gray-900">{{ $barn->infraestructura->nombre }}</td>
                    <td class="px-6 py-4 text-center text-sm text-gray-900">{{ $barn->infraestructura->capacidad_maxima}}</td>
                    <td class="px-6 py-4 text-center text-sm text-gray-900">{{ $barn->infraestructura->capacidad_disponible }}</td>
                    <td class="px-6 py-4 text-center text-sm text-gray-900">{{ $barn->infraestructura->estado }}</td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center space-x-4">
                            <button id="deleteConfirm" class="text-red-500 hover:text-red-900 font-medium transition duration-300">
                                Eliminar
                            </button>
                            <a href="{{ route('barn-barns-edit', ['id' => $barn->id]) }}" class="text-blue-500 hover:text-blue-900">
                                Editar
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">
                        No se encontraron galpones registrados
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="mt-4 p-4 bg-gray-50 border-t border-gray-200">
        {{ $barns->links() }}
    </div>
</div>

@section('scripts')
@script
<script>
    const deleteButtons = document.querySelectorAll('#deleteConfirm');

    const deleteBarn = (id) => {
        $wire.dispatch('deleteBarn', {
            id: id
        });
    }

    deleteButtons.forEach(button => {
        button.addEventListener('click', () => {
            Swal.fire({
                title: "¿Estás seguro?",
                text: "¡No podrás revertir esta acción!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, eliminar"
            }).then((result) => {
                if (result.isConfirmed) {
                    const id = button.closest('tr').dataset.barnId;
                    deleteBarn(id);
                }
            });
        });
    });

    $wire.on('deleteError', () => {
        Swal.fire({
            title: "Error",
            text: "No se pudo eliminar el galpón. porque tiene stocks asociados.",
            icon: "error"
        });
    });

    $wire.on('deleteSuccess', () => {
        Swal.fire({
            title: "Eliminado",
            text: "El galpón ha sido eliminado.",
            icon: "success"
        });
    });

    //============================
    //PARTE DE VERIFICAR CAPACIDAD
    //============================

    const verifyBarnCapacityButton = document.getElementById('verifyBarnCapacity');

    verifyBarnCapacityButton.addEventListener('click', () => {
        Swal.fire({
            title: "¿Quieres verificar la capacidad de los galpones?",
            text: "Si algún galpón tiene menos de 500 kg, se generará un pedido de traslado.",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, verificar",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                $wire.dispatch('verificarCapacidad');
            }
        });
    });

    // Mensajes de éxito
    $wire.on('verificarCapacidadSuccess', (message) => {
        Swal.fire({
            title: "Éxito",
            text: message,
            icon: "success"
        });
    });

    // Mensajes de advertencia
    $wire.on('verificarCapacidadWarning', (message) => {
        Swal.fire({
            title: "Advertencia",
            text: message,
            icon: "warning"
        });
    });

    // Mensajes de información
    $wire.on('verificarCapacidadInfo', (message) => {
        Swal.fire({
            title: "Información",
            text: message,
            icon: "info"
        });
    });

    // Mensajes de error
    $wire.on('verificarCapacidadError', (message) => {
        Swal.fire({
            title: "Error",
            text: message,
            icon: "error"
        });
    });
</script>
@endscript
@endsection