<div class="container mx-auto py-12 px-6">
    <!-- Título Principal -->
    <div class="flex items-center bg-gradient-to-r from-indigo-50 via-amber-100 to-emerald-100 p-8 rounded-3xl shadow-lg hover:shadow-xl transition-shadow">
        <h2 class="text-4xl font-extrabold text-gray-700 flex items-center gap-4">
            <i class="bi bi-plus-circle-fill text-5xl text-blue-600 bg-gradient-to-br from-blue-200 to-blue-400 p-3 rounded-full shadow-inner"></i>
            <span class="bg-gradient-to-r from-blue-700 to-gray-800 bg-clip-text text-transparent">
                Registrar Nuevo Galpón
            </span>
        </h2>
    </div>

    <!-- Formulario -->
    <form class="mt-10 space-y-12">
        <!-- Información General -->
        <div class="bg-gray-100 p-10 rounded-2xl shadow-lg hover:shadow-2xl transition-all">
            <div class="bg-indigo-50 p-10 rounded-2xl shadow-lg hover:shadow-2xl transition-all">
                <div class="text-center">
                    <h3 class="text-3xl font-extrabold flex items-center justify-center gap-3 bg-gradient-to-r from-green-700 to-amber-600 bg-clip-text text-transparent">
                        <i class="bi bi-house-door-fill text-3xl text-green-400 drop-shadow-md"></i>
                        Información General del Galpón
                    </h3>
                    <div class="w-60 h-1 bg-gray-400 rounded-full mt-4 mx-auto"></div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mt-8">
                    <!-- Nombre -->
                    <div class="space-y-3">
                        <label for="nombre" class="font-semibold text-gray-700">Nombre del Galpón:</label>
                        <input wire:model="nombre" type="text" id="nombre" class="w-full border border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-lg shadow-sm transition-all @error('nombre') border-red-500 @enderror" placeholder="Ej: Galpón 1">
                        @error('nombre') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Capacidad Máxima -->
                    <div class="space-y-3">
                        <label for="capacidad_maxima" class="font-semibold text-gray-700">Capacidad Máxima (Kg):</label>
                        <input wire:model="capacidad_maxima" type="number" id="capacidad_maxima" class="w-full border border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-lg shadow-sm transition-all @error('capacidad_maxima') border-red-500 @enderror" placeholder="Capacidad total del galpón">
                        @error('capacidad_maxima') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                </div>
            </div>

            <div class="my-12"></div>

            <!-- Coordenadas -->
            <div class="bg-indigo-50 p-10 rounded-2xl shadow-lg hover:shadow-2xl transition-all">
                <div class="text-center">
                    <h3 class="text-3xl font-extrabold flex items-center justify-center gap-3 bg-gradient-to-r from-green-700 to-amber-600 bg-clip-text text-transparent">
                        <i class="bi bi-geo-alt-fill text-3xl text-green-400 drop-shadow-md"></i>
                        Coordenadas del Galpón
                    </h3>
                    <div class="w-60 h-1 bg-gray-400 rounded-full mt-4 mx-auto"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mt-8">
                    <!-- Latitud -->
                    <div class="space-y-3">
                        <label for="latitude" class="font-semibold text-gray-700">Latitud:</label>
                        <input wire:model="latitude" type="text" id="latitude" class="w-full border border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-lg shadow-sm transition-all @error('latitude') border-red-500 @enderror" placeholder="Ingrese la latitud">
                        @error('latitude') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Longitud -->
                    <div class="space-y-3">
                        <label for="longitude" class="font-semibold text-gray-700">Longitud:</label>
                        <input wire:model="longitude" type="text" id="longitude" class="w-full border border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-lg shadow-sm transition-all @error('longitude') border-red-500 @enderror" placeholder="Ingrese la longitud">
                        @error('longitude') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <!-- Botón Guardar -->
            <div class="text-center mt-10">
                <button id="saveButton" type="button" class="bg-gradient-to-r from-green-400 to-teal-400 text-white font-bold py-3 px-12 rounded-full shadow-lg hover:scale-105 hover:shadow-2xl transform transition-all">
                    <i class="bi bi-save mr-2"></i> Guardar
                </button>
            </div>
        </div>
    </form>
</div>

@section('scripts')
@script
<script>
    const saveButton = document.getElementById('saveButton');
    const saveBarn = () => {
        $wire.dispatch('saveBarn');
    }

    const saveFinish = () => {
        $wire.dispatch('saveFinish');
    }

    const saveAnother = () => {
        $wire.dispatch('saveAnother');
    }

    saveButton.addEventListener('click', (event) => {
        event.preventDefault
        Swal.fire({
            title: "Realmente desea guardar los cambios?",
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: "Si, guardar",
            denyButtonText: `No, cancelar`,
        }).then((result) => {
            if (result.isConfirmed) {
                saveBarn();
            } else if (result.isDenied) {
                Swal.fire("No se guardaron los cambios", "", "info");
            }
        });
    });

    $wire.on('saveSuccess', () => {
        Swal.fire({
            position: "center",
            icon: "success",
            title: "El galpon ha sido creado correctamente",
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