@extends('layouts.app')

@section('content')
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Edit Role Permission</h2>
        <form action="{{ route('role_permissions.update', $rolePermission->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="role_id" class="block text-gray-700 font-medium">Role</label>
                <select id="role_id" name="role_id" class="w-full p-2 border rounded-lg" required>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ $rolePermission->role_id == $role->id ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="permission_id" class="block text-gray-700 font-medium">Permission</label>
                <select id="permission_id" name="permission_id" class="w-full p-2 border rounded-lg" required>
                    @foreach ($permissions as $permission)
                        <option value="{{ $permission->id }}"
                            {{ $rolePermission->permission_id == $permission->id ? 'selected' : '' }}>
                            {{ $permission->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                Update Role Permission
            </button>
        </form>
    </div>
@endsection
