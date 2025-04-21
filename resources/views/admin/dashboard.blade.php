<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 font-sans">

    <!-- Mobile Navbar -->
    <div class="md:hidden flex items-center justify-between bg-gray-800 p-4 text-white">
        <h2 class="text-lg font-bold">Admin Panel</h2>
        <button onclick="document.getElementById('sidebar').classList.toggle('-translate-x-full')">
            ☰
        </button>
    </div>

    <div class="flex h-screen">
        <!-- Sidebar -->
        <div id="sidebar"
            class="fixed md:static top-0 left-0 w-64 bg-gray-800 text-white p-6 space-y-4 transform -translate-x-full md:translate-x-0 transition-transform duration-200 ease-in-out z-50 h-full">
            <h2 class="text-2xl font-bold mb-8 hidden md:block">Admin Panel</h2>
            <nav class="flex flex-col space-y-3">
                <a href="#" class="hover:bg-gray-700 p-2 rounded">Dashboard</a>
                {{-- <a href="#" class="hover:bg-gray-700 p-2 rounded">Users</a> --}}
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open"
                        class="w-full text-left hover:bg-gray-700 p-2 rounded flex justify-between items-center">
                        Users
                        <svg class="w-4 h-4 transform transition-transform" :class="{ 'rotate-180': open }"
                            fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-transition
                        class="mt-1 bg-gray-700 rounded shadow-lg space-y-1 overflow-hidden">
                        <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-600">All Users</a>
                        <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-600">Add User</a>
                        <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-600">User Roles</a>
                    </div>
                </div>
                <div class="w-full border-1 "></div>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6 overflow-auto w-full">
            <h1 class="text-3xl font-bold mb-6">Dashboard</h1>
        </div>
    </div>

</body>

</html>
