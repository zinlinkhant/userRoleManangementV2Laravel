<table class="w-full border-collapse border border-gray-300">
    <thead>
        <tr class="bg-gray-100">
            <th class="border border-gray-300 px-4 py-2">ID</th>
            <th class="border border-gray-300 px-4 py-2">Role</th>
            <th class="border border-gray-300 px-4 py-2">Permission</th>
            <th class="border border-gray-300 px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rolePermissions as $rolePermission)
            <tr>
                <td class="border border-gray-300 px-4 py-2">{{ $rolePermission->id }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $rolePermission->role->name }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $rolePermission->permission->name }}</td>
                <td class="border border-gray-300 px-4 py-2">
                    <a href="{{ route('role_permissions.edit', $rolePermission->id) }}"
                        class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                    <form action="{{ route('role_permissions.destroy', $rolePermission->id) }}" method="POST"
                        class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded"
                            onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
