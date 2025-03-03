<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-4">Features</h2>

    @if (session('success'))
        <div class="mb-4 p-3 text-green-700 bg-green-100 rounded">{{ session('success') }}</div>
    @endif

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border border-gray-300 px-4 py-2 text-left">ID</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Name</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($features as $feature)
                <tr class="border border-gray-300">
                    <td class="border border-gray-300 px-4 py-2">{{ $feature->id }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $feature->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="{{ route('features.edit', $feature->id) }}"
                            class="text-blue-600 hover:underline">Edit</a> |
                        <form action="{{ route('features.destroy', $feature->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
