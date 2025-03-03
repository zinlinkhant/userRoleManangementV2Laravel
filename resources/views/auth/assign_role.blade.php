@extends('layouts.app')

@section('content')
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Assign Role to Admin User</h2>

        @if (session('success'))
            <div class="bg-green-500 text-white p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('assignRole') }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="adminUser" class="block text-gray-700 font-medium">Select Admin User</label>
                <select id="adminUser" name="admin_user_id" class="w-full p-2 border rounded-lg" required>
                    <option value="">Choose an admin user</option>
                    @foreach ($adminUsers as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="role" class="block text-gray-700 font-medium">Select Role</label>
                <select id="role" name="role_id" class="w-full p-2 border rounded-lg" required>
                    <option value="">Choose a role</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                Assign Role
            </button>
        </form>
    </div>

    <table class="w-full border-collapse border border-gray-300 rounded-lg shadow-md">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="px-4 py-2 border border-gray-300">Name</th>
                <th class="px-4 py-2 border border-gray-300">Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border border-gray-300">{{ $user->name }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $adminUser->role->name ?? 'No Role' }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>



    <script>
        document.getElementById('assignRoleForm').addEventListener('submit', function(event) {
            const selectedUser = document.getElementById('adminUser').value;
            if (!selectedUser) {
                event.preventDefault();
                alert('Please select an admin user.');
            } else {
                this.action = `/${selectedUser}/assign-role`;
            }
        });
    </script>
@endsection
