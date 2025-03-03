<nav class="bg-white p-4 shadow-lg">
    <div class="container mx-auto flex justify-between items-center">
        <ul class="flex space-x-6">
            <li><a href="{{ route('roles.create') }}" class="text-black hover:text-gray-600 transition">Role</a></li>
            <li><a href="{{ route('permissions.create') }}"
                    class="text-black hover:text-gray-600 transition">Permission</a></li>
            <li><a href="{{ route('features.create') }}" class="text-black hover:text-gray-600 transition">Feature</a>
            </li>
            <li><a href="{{ route('role_permissions.create') }}"
                    class="text-black hover:text-gray-600 transition">Role_Permissions</a></li>
            <li><a href="{{ route('register') }}" class="text-black hover:text-gray-600 transition">Register</a>
            </li>
            <li><a href="{{ route('login') }}" class="text-black hover:text-gray-600 transition">Login</a>
            </li>
            <li><a href="{{ route('assignRolePage') }}" class="text-black hover:text-gray-600 transition">Assign Role</a>
            </li>
        </ul>
    </div>
</nav>
