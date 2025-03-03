@extends('layouts.app')

@section('content')
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Create Permission</h2>
        <form action="{{ route('permissions.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium">Permission Name</label>
                <input type="text" id="name" name="name"
                    class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="feature_id" class="block text-gray-700 font-medium">Feature</label>
                <select id="feature_id" name="feature_id"
                    class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="">Select Feature</option>
                    @foreach ($features as $feature)
                        <option value="{{ $feature->id }}">{{ $feature->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                Create Permission
            </button>
        </form>
        @include('permissions.index')
    </div>
@endsection
