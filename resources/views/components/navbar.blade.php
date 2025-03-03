<nav class="bg-white p-4 shadow-lg">
    <div class="container mx-auto flex justify-between items-center">
        <ul class="flex space-x-6">
            @if (Auth::check())
                <li><a href="{{ route('roles.create') }}" class="text-black hover:text-gray-600 transition">Role</a></li>
                <li><a href="{{ route('permissions.create') }}"
                        class="text-black hover:text-gray-600 transition">Permission</a></li>
                <li><a href="{{ route('features.create') }}" class="text-black hover:text-gray-600 transition">Feature</a>
                </li>
                <li><a href="{{ route('role_permissions.create') }}"
                        class="text-black hover:text-gray-600 transition">Role_Permissions</a></li>
                <li><a href="{{ route('assignRolePage') }}" class="text-black hover:text-gray-600 transition">Assign
                        Role</a>
                </li>
            @endif

            <li><a href="{{ route('register') }}" class="text-black hover:text-gray-600 transition">Register</a>
            </li>
            <li><a href="{{ route('login') }}" class="text-black hover:text-gray-600 transition">Login</a>
            </li>

        </ul>
        <ul>
            @if (Auth::check())
                <h2 class="text-black font-bold text-xl">{{ Auth::user()->name }}</h2>
                @if (Auth::check())
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="bg-red-500 text-white  rounded-lg hover:bg-red-600 px-1.5">Logout</button>
                    </form>
                @endif
            @else
                <h2 class="text-black font-bold text-xl"><a href="{{ route('login') }}"
                        class="text-black hover:text-gray-600 transition">Login First</a></h2>
            @endif
        </ul>
    </div>
</nav>
