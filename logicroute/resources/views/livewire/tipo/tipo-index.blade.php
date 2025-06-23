<div class="container mx-auto px-4 py-8">


    <!-- Botón Agregar Tipo -->
    <div class="flex justify-end mb-6">
        <form class="bg-white p-5 rounded-lg shadow-lg w-full">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Nombre -->
                <div class="flex items-center space-x-3">
                    <label for="nombre" class="font-semibold text-gray-700 w-1/3 text-right">Nombre del tipo:</label>
                    <div class="relative w-full">
                        <input wire:model="nombre" type="text" id="nombre" name="nombre"
                            class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm 
                            @error('nombre') border-red-500 @enderror"
                            placeholder="Ingrese el nombre del lote">

                        @error('nombre')
                        <span class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>

                <button id="saveTipo" type="button" class="bg-emerald-500 hover:bg-emerald-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105">
                    Registrar Tipo
                </button>
            </div>
        <form\>
    </div>

    <!-- Tabla de Tipos -->
    <div class="overflow-x-auto bg-white rounded-lg shadow-md">
        <table class="w-full table-auto border-collapse">
            <thead class="bg-emerald-200 text-gray-700">
                <tr class="rounded-lg shadow-lg">
                    <th class="px-6 py-3 text-center text-xs font-bold uppercase">ID</th>
                    <th class="px-6 py-3 text-center text-xs font-bold uppercase">Nombre</th>
                    <th class="px-6 py-3 text-center text-xs font-bold uppercase">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tipos as $tipo)
                <tr wire:key="tipo-{{ $tipo->id }}" class="border-b hover:bg-gray-100" data-tipo-id="{{ $tipo->id }}">
                    <td class="px-6 py-4 text-center text-sm font-medium text-gray-900">{{ $tipo->id }}</td>
                    <td class="px-6 py-4 text-center text-sm text-gray-700">{{ $tipo->nombre }}</td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center space-x-4">
                            <!-- Botón Eliminar -->
                            <button id="deleteConfirm" class="text-red-500 hover:text-red-700 font-medium transition duration-300">
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
    const deleteButtons = document.querySelectorAll('#deleteConfirm');

    const deleteTipo = (id) => {
        $wire.dispatch('deleteTipo', {
            id: id
        });
    }

    deleteButtons.forEach(button => {
        button.addEventListener('click', () => {
            event.preventDefault();
            event.stopPropagation();
            Swal.fire({
                title: "¿Estás seguro?",
                text: "¡No se podrá revertir esta acción!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, eliminar!"
            }).then((result) => {
                if (result.isConfirmed) {
                    const id = button.closest('tr').dataset.tipoId;
                    deleteTipo(id);
                }
            });
        });
    });

    $wire.on('deleteError', () => {
        Swal.fire({
            title: "Error",
            text: "No se pudo eliminar el tipo.",
            icon: "error"
        });
    });

    $wire.on('deleteSuccess', () => {
        Swal.fire({
            title: "Eliminado",
            text: "El tipo ha sido eliminado.",
            icon: "success"
        });
    });

    //Alertas de crear tipo
    const saveButton = document.querySelector('#saveTipo');

    const saveTipo = () => {
        $wire.dispatch('saveTipo');
    }

    saveButton.addEventListener('click', (event) => {
        event.preventDefault();
        Swal.fire({
            title: "Realmente desea guardar los cambios?",
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: "Si, guardar",
            denyButtonText: `No, cancelar`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                saveTipo();
                //Swal.fire("Guardado", "", "success");
            } else if (result.isDenied) {
                Swal.fire("No se guardaron los cambios", "", "info");
            }
        });
    });

    $wire.on('saveSuccess', () => {
        Swal.fire({
            position: "center",
            icon: "success",
            title: "El tipo ha sido creado correctamente",
            showConfirmButton: true,
            confirmButtonText: "Finalizar",
            showDenyButton: true,
            denyButtonText: "Crear Otro",
            customClass: {
                denyButton: 'bg-lime-500 text-white'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                location.reload();
            } else if (result.isDenied) {
                document.querySelector('#nombre').value = '';
            }
        });
    });

</script>
@endscript
@endsection