@extends('layouts.app')

@section('title', 'Edit Feature')

@section('content')
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Edit Feature</h2>
        <form action="{{ route('features.update', $feature->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium">Feature Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $feature->name) }}"
                    class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                Update Feature
            </button>
        </form>
    </div>
@endsection
