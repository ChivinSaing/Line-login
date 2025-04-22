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
            <hr>

            <div class="overflow-x-auto mt-8">
                <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">First Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone Number</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Salon Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Salon Address</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Website 1</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Website 2</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($salons as $salon)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $salon->first_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $salon->last_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $salon->phone_number }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $salon->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $salon->salon_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $salon->salon_address }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                @if($salon->salon_website_1)
                                    <a href="{{ $salon->salon_website_1 }}" target="_blank" class="text-blue-600 hover:text-blue-800 hover:underline">{{ $salon->salon_website_1 }}</a>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                @if($salon->salon_website_2)
                                    <a href="{{ $salon->salon_website_2 }}" target="_blank" class="text-blue-600 hover:text-blue-800 hover:underline">{{ $salon->salon_website_2 }}</a>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" value="" class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                </label>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>
