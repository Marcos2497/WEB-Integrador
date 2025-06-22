<div class="container mx-auto px-4 py-8">
    <!-- Botón Registrar Lote -->
    <div class="flex justify-end mb-6">
        <a href="{{ route('food-foods-create') }}"
            class="bg-emerald-500 hover:bg-emerald-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105">
            Registrar Alimento
        </a>
    </div>

    <!-- Tabla de Alimentos -->
    <div class="overflow-x-auto bg-white rounded-lg shadow-md">
        <table class="w-full table-auto border-collapse">
            <thead class="bg-emerald-200 text-gray-900">
                <tr class="rounded-lg shadow-lg">
                    <th class="px-6 py-3 text-center text-xs font-bold uppercase">ID</th>
                    <th class="px-6 py-3 text-center text-xs font-bold uppercase">Nombre de Comida</th>
                    <th class="px-6 py-3 text-center text-xs font-bold uppercase">Tipo</th>
                    <th class="px-6 py-3 text-center text-xs font-bold uppercase">Duracion en días</th>
                    <th class="px-6 py-3 text-center text-xs font-bold uppercase">Precio</th>
                    <th class="px-6 py-3 text-center text-xs font-bold uppercase">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($foods as $food)
                <tr wire:key="food-{{ $food->id }}" class="border-b hover:bg-gray-100" data-food-id="{{ $food->id }}">
                    <td class="px-6 py-4 text-center text-sm font-medium text-gray-900">{{ $food->id }}</td>
                    <td class="px-6 py-4 text-center text-sm text-gray-700">{{ $food->name }}</td>
                    <td class="px-6 py-4 text-center text-sm text-gray-700">{{ $food->tipo->nombre }}</td>
                    <td class="px-6 py-4 text-center text-sm text-gray-700">
                        @if($food->duracion_dias)
                        {{ $food->duracion_dias }}
                        @else
                        N/A
                        @endif
                    </td>
                    <td class="px-6 py-4 text-center text-sm text-gray-700">{{ $food->precio }}</td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center space-x-4">
                            <!-- Botón Editar -->
                            <a href="{{ route('food-foods-edit', $food->id) }}"
                                class="text-blue-500 hover:text-blue-700 font-medium transition duration-300">
                                Editar
                            </a>
                            <!-- Botón Eliminar -->
                            <button id='deteleConfirm' class="text-red-500 hover:text-red-700 font-medium transition duration-300">
                                Eliminar
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@section('scripts')
@script
<script>
    const deleteButtons = document.querySelectorAll('#deteleConfirm');

    const deleteFood = (id) => {
        $wire.dispatch('deleteFood', {
            id: id
        });
    }

    deleteButtons.forEach(button => {
        button.addEventListener('click', () => {
            Swal.fire({
                title: "Estas seguro?",
                text: "No se podrá revertir esta acción!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, eliminar!"
            }).then((result) => {
                if (result.isConfirmed) {

                    const id = button.closest('tr').dataset.foodId;
                    deleteFood(id);

                    // Swal.fire({
                    //     title: "Eliminado!",
                    //     text: "El alimento ha sido eliminado.",
                    //     icon: "success"
                    // });
                }
            });
        });
    });

    $wire.on('deleteError', () => {
        Swal.fire({
            title: "Error!",
            text: "No se pudo eliminar el alimento.",
            icon: "error"
        });
    });

    $wire.on('deleteSuccess', () => {
        Swal.fire({
            title: "Eliminado!",
            text: "El alimento ha sido eliminado.",
            icon: "success"
        });
    });

   
</script>
@endscript
@endsection