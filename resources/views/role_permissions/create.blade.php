@extends('layouts.app')

@section('content')
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Assign Permission to Role</h2>
        @if (session('success'))
            <div class="mb-4 p-3 text-green-700 bg-green-100 rounded">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="mb-4 p-3 text-red-700 bg-green-100 rounded">{{ session('error') }}</div>
        @endif
        <form action="{{ route('role_permissions.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="role_id" class="block text-gray-700 font-medium">Select Role</label>
                <select id="role_id" name="role_id" class="w-full p-2 border rounded-lg">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="permission_id" class="block text-gray-700 font-medium">Select Permission</label>
                <select id="permission_id" name="permission_id" class="w-full p-2 border rounded-lg">
                    @foreach ($permissions as $permission)
                        <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                Assign Permission
            </button>
        </form>
        @include('role_permissions.index')
    </div>
@endsection
