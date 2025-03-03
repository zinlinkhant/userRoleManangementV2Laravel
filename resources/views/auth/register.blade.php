@extends('layouts.app')

@section('content')
    <form action="{{ route('register') }}" method="POST" class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Name:</label>
            <input type="text" name="name" required
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Username:</label>
            <input type="text" name="username" required
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Email:</label>
            <input type="email" name="email" required
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Password:</label>
            <input type="password" name="password" required
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Confirm Password:</label>
            <input type="password" name="password_confirmation" required
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">
            Register
        </button>
    </form>
@endsection
