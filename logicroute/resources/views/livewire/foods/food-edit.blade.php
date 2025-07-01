<div class="container mx-auto py-12 px-6">
    <!-- Título Principal -->
    <div
        class="flex items-center bg-gradient-to-r from-indigo-50 via-amber-100 to-emerald-100 p-8 rounded-3xl shadow-lg hover:shadow-xl transition-shadow">
        <h2 class="text-4xl font-extrabold text-gray-700 flex items-center gap-4">
            <i
                class="bi bi-pencil-square text-5xl text-blue-600 bg-gradient-to-br from-blue-200 to-blue-400 p-3 rounded-full shadow-inner"></i>
            <span class="bg-gradient-to-r from-blue-700 to-gray-800 bg-clip-text text-transparent">
                Editar Galpón: {{ $name }}
            </span>
        </h2>
    </div>

    <!-- Formulario -->
    <form wire:submit.prevent="edit" class="mt-10 space-y-12">
        <div class="bg-gray-100 p-10 rounded-2xl shadow-lg hover:shadow-2xl transition-all">
            <div class="bg-indigo-50 p-10 rounded-2xl shadow-lg hover:shadow-2xl transition-all">
                <div class="text-center">
                    <h3
                        class="text-3xl font-extrabold flex items-center justify-center gap-3 bg-gradient-to-r from-green-700 to-amber-600 bg-clip-text text-transparent">
                        <i class="bi bi-box-seam text-3xl text-green-400 drop-shadow-md"></i>
                        Información del Alimento
                    </h3>
                    <div class="w-60 h-1 bg-gray-400 rounded-full mt-4 mx-auto"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mt-8">
                    <!-- Nombre del Alimento -->
                    <div class="space-y-3">
                        <label for="name" class="font-semibold text-gray-700">Nombre del Alimento:</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <i class="bi bi-egg-fried text-yellow-500 text-xl"></i>
                            </span>
                            <input wire:model="name" type="text" id="name" name="name"
                                class="pl-10 w-full border border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-lg shadow-sm transition-all @error('name') border-red-500 @enderror"
                                placeholder="Ingrese el nombre del alimento">
                        </div>
                        @error('name')
                            <span class="text-red-500 text-sm">(*) Campo Obligatorio</span>
                        @enderror
                    </div>

                    <!-- Tipo -->
                    <div class="space-y-3">
                        <label for="tipo_id" class="font-semibold text-gray-700">Tipo:</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <i class="bi bi-list text-green-500 text-xl"></i>
                            </span>
                            <select wire:model="tipo_id" id="tipo_id" name="tipo_id"
                                class="pl-10 w-full border border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-lg shadow-sm transition-all @error('tipo_id') border-red-500 @enderror">
                                <option value="">Seleccione el tipo de alimento</option>
                                @foreach ($tipos as $tipo)
                                    <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('tipo_id')
                            <span class="text-red-500 text-sm">(*) Campo Obligatorio</span>
                        @enderror
                    </div>


                </div>

                <div class="my-12"></div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mt-8">
                    <!-- Precio -->
                    <div class="space-y-3">
                        <label for="precio" class="font-semibold text-gray-700">Precio:</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <i class="bi bi-currency-dollar text-yellow-500 text-xl"></i>
                            </span>
                            <input wire:model="precio" type="number" id="precio" name="precio" step="0.01"
                                class="pl-10 w-full border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm transition-all @error('food.precio') border-red-500 @enderror"
                                placeholder="Ingrese el precio">
                        </div>
                        @error('precio')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Duración (días) -->
                    <div class="space-y-3">
                        <label for="duracion_dias" class="font-semibold text-gray-700">Duración (días):</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <i class="bi bi-calendar text-blue-500 text-xl"></i>
                            </span>
                            <input wire:model="duracion_dias" type="number" id="duracion_dias" name="duracion_dias"
                                class="pl-10 w-full border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm transition-all @error('food.duracion_dias') border-red-500 @enderror"
                                placeholder="Ingrese la duración en días">
                        </div>
                        @error('duracion_dias')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Botón Guardar Cambios -->
                <div class="text-center mt-10">
                    <button type="submit"
                        class="bg-gradient-to-r from-green-400 to-teal-400 text-white font-bold py-3 px-12 rounded-full shadow-lg hover:scale-105 hover:shadow-2xl transform transition-all">
                        <i class="bi bi-save mr-2"></i> Guardar Cambios
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
