@extends('layouts.app')

@section('content')
    <form action="{{ route('login') }}" method="POST" class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        @csrf
        <h2 class="text-2xl font-bold mb-4 text-center">Login</h2>

        <label class="block text-gray-700 font-medium mb-2">Email</label>
        <input type="email" name="email" required
            class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

        <label class="block text-gray-700 font-medium mb-2 mt-4">Password</label>
        <input type="password" name="password" required
            class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

        <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition mt-4">
            Login
        </button>
    </form>
@endsection
