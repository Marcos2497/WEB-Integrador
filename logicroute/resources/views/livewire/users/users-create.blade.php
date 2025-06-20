<div>
    <div class="container mx-auto flex flex-col justify-center">
        <div class="flex justify-start bg-gray-200 p-2 rounded">
            <h2 class="text-xl font-bold text-gray-900">Crear Nuevo Usuario</h2>
        </div>
        <form wire:submit.prevent="save" class="bg-white p-5 rounded-lg shadow-lg w-full">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Nombre -->
                <div class="flex items-center space-x-3">
                    <label for="name" class="font-semibold text-gray-700 w-1/3 text-right">Nombre:</label>
                    <div class="relative w-full">
                        <input wire:model="name" type="text" id="name" name="name"
                            class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm 
                            @error('name') border-red-500 @enderror"
                            placeholder="Ingrese el nombre">

                        @error('name')
                        <span class="text-red-500 text-sm mt-1">(*) Campo Obligatorio</span>
                        @enderror
                    </div>
                </div>

                <!-- Email -->
                <div class="flex items-center space-x-3">
                    <label for="email" class="font-semibold text-gray-700 w-1/3 text-right">Email:</label>
                    <div class="relative w-full">
                        <input wire:model="email" type="email" id="email" name="email"
                            class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm 
                            @error('email') border-red-500 @enderror"
                            placeholder="ejemplo@correo.com">

                        @error('email')
                        <span class="text-red-500 text-sm mt-1">(*) Campo Obligatorio</span>
                        @enderror
                    </div>
                </div>

                <!-- Rol -->
                <div class="flex items-center space-x-3">
                    <label for="role" class="font-semibold text-gray-700 w-1/3 text-right">Rol:</label>
                    <div class="relative w-full">
                        <select wire:model="roleSelected" id="roleSelected" name="roleSelected"
                            class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm 
                            @error('role') border-red-500 @enderror">
                            <option value="">Seleccione un rol</option>
                            @foreach($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('roleSelected')
                        <span class="text-red-500 text-sm mt-1">(*) Campo Obligatorio</span>
                        @enderror
                    </div>
                </div>

                <!-- Botón Guardar -->
                <div class="col-span-1 md:col-span-2 text-center mt-4">
                    <button type="submit" class="bg-green-200 text-green-800 font-semibold py-2 px-6 rounded-full shadow hover:bg-green-600 transition">
                        <i class="bi bi-save mr-2"></i> Guardar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@section('scripts')
@script
<script>
    $wire.on('alerta', ({
        tipo,
        mensaje
    }) => {
        Swal.fire({
            icon: tipo,
            title: tipo === 'error' ? 'Error' : 'Éxito',
            text: mensaje,
            showConfirmButton: false,
            timer: 3000
        });
    });
</script>
@endscript
@endsection