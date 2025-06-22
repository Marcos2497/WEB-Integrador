<div class="container mx-auto flex flex-col justify-center">
    <div class="flex justify-start bg-gray-200 p-2 rounded">
        <h2 class="text-xl font-bold text-gray-900">Ingresar los datos del Alimento</h2>
    </div>
    <form class="bg-white p-5 rounded-lg shadow-lg w-full ">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Primera columna: Nombre del Alimento -->
            <div class="flex items-center space-x-3">
                <label for="name" class="font-semibold text-gray-700 w-1/3 text-right">Nombre del Alimento:</label>
                <div class="relative w-full">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="bi bi-egg-fried text-primary text-xl"></i>
                    </span>
                    <input wire:model="name" type="text" id="name" name="name"
                        class="pl-10 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm 
                        @error('name') border-red-500 @enderror"
                        placeholder="Ingrese el nombre del alimento">

                    <!-- Mensaje de error -->
                    @error('name')
                    <span class="text-red-500 text-sm mt-1">{{$message}}</span>
                    @enderror
                </div>
            </div>


            <!-- Segunda columna: Tipo de Alimento -->
            <div class="flex items-center space-x-3">
                <label for="tipo_id" class="font-semibold text-gray-700 w-1/3 text-right">Tipo:</label>
                <div class="relative w-full">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="bi bi-list text-green-500 text-xl"></i>
                    </span>
                    <select wire:model="tipo_id" id="tipo_id" name="tipo_id"
                        class="pl-10 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm 
                        @error('tipo_id') border-red-500 @enderror">
                        <option value="">Seleccione el tipo de alimento</option>
                        @foreach($tipos as $tipo)
                            <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                        @endforeach
                    </select>

                    <!-- Mensaje de error -->
                    @error('tipo')
                    <span class="text-red-500 text-sm mt-1">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <!-- Precio y Duración (días) -->
            <div class="flex items-center space-x-3 col-span-1 md:col-span-2">
                <label for="precio" class="font-semibold text-gray-700 w-1/6 text-right">Precio:</label>
                <div class="relative w-1/2">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="bi bi-currency-dollar text-yellow-500 text-xl"></i>
                    </span>
                    <input wire:model="precio" type="number" id="precio" name="precio" step="0.01"
                        class="pl-10 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm 
                        @error('precio') border-red-500 @enderror"
                        placeholder="Ingrese el precio">

                    <!-- Mensaje de error -->
                    @error('precio')
                    <span class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <label for="duracion_dias" class="font-semibold text-gray-700 w-1/6 text-right">Duración (días):</label>
                <div class="relative w-1/2">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="bi bi-clock text-blue-500 text-xl"></i>
                    </span>
                    <input wire:model="duracion_dias" type="number" id="duracion_dias" name="duracion_dias"
                        class="pl-10 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm 
                        @error('duracion_dias') border-red-500 @enderror"
                        placeholder="Ingrese la duración en días">

                    <!-- Mensaje de error -->
                    @error('duracion_dias')
                    <span class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>

            <!-- Botón Guardar -->
            <div class="col-span-1 md:col-span-2 text-center mt-4">
                <button id='saveButton' type="button" class="bg-green-200 text-green-800 font-semibold py-2 px-6 rounded-full shadow hover:bg-green-600 transition">
                    <i class="bi bi-save mr-2"></i> Guardar
                </button>
            </div>

    </form>
</div>

@section('scripts')
@script
<script>
    const saveButton = document.getElementById('saveButton');
    const saveFood = () => {
        $wire.dispatch('saveFood');
    }
    const saveFinish = () => {
        $wire.dispatch('saveFinish');
    }

    const saveAnother = () => {
        $wire.dispatch('saveAnother');
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
                saveFood();
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
            title: "El alimento ha sido creado correctamente",
            showConfirmButton: true,
            confirmButtonText: "Finalizar",
            showDenyButton: true,
            denyButtonText: "Crear Otro",
            customClass: {
                denyButton: 'bg-lime-500 text-white'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                saveFinish();
            } else if (result.isDenied) {
                saveAnother();
            }
        });
    });
</script>
@endscript
@endsection