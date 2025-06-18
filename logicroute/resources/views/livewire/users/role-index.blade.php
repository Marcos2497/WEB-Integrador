<div>

    <table class="w-full rounded-lg shadow-lg">
        <thead class="bg-amber-200 rounded-lg shadow-lg">
            <tr>
            <th class="px-6 py-3 text-center text-xs font-medium text-black-500 uppercase tracking-wider">ID</th>
            <th class="px-6 py-3 text-center text-xs font-medium text-black-500 uppercase tracking-wider">Role Name</th>
            <th class="px-6 py-3 text-center text-xs font-medium text-black-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
                <tr wire:key="{{$role->id}}" class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium text-gray-900">{{ $role->id }}</td>
                    <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500">{{ $role->name }}</td>
                    <td class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium">
                        <!-- Aquí irían los botones -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
