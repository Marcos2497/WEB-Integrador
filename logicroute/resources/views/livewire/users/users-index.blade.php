<div>
    <div class="flex justify-end mb-4">
            <a href= "{{ route('users-users-create') }}"class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
                Agregar Usuario
            </a>
        </div>

    <table class="w-full rounded-lg shadow-lg">
        <thead class="bg-amber-200 rounded-lg shadow-lg">
            <tr>
                <th class="px-6 py-3 text-center text-xs font-medium text-black-500 uppercase tracking-wider">ID</th>
                <th class="px-6 py-3 text-center text-xs font-medium text-black-500 uppercase tracking-wider">Nombre de Usuario</th>
                <th class="px-6 py-3 text-center text-xs font-medium text-black-500 uppercase tracking-wider">Email</th>
                {{-- <th class="px-6 py-3 text-center text-xs font-medium text-black-500 uppercase tracking-wider">Rol</th> --}}
                <th class="px-6 py-3 text-center text-xs font-medium text-black-500 uppercase tracking-wider">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr wire:key="{{$user->id}}" class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium text-gray-900">{{ $user->id }}</td>
                    <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500">{{ $user->name }}</td>
                    <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500">{{ $user->email }}</td>
                    {{-- <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500">
                        @foreach($user->roles as $role)
                            <span class="inline-block rounded-full px-3 py-1 text-sm font-semibold text-gray-600 mr-2 mb-2">{{ $role->name }}</span>
                        @endforeach
                    </td> --}}
                    <td class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium">
                        <!-- Aquí irían los botones -->
                        <div>
                            <button class="text-red-600 hover:text-red-900 ml-4" wire:confirm="Desea borrar este Camion"   wire:click="delete({{ $user->id }})">Eliminar</button>                        
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
