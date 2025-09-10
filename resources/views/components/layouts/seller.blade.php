<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Zierra</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-gray-100 font-sans antialiased flex flex-row min-h-screen">
    <div id="sidebar" class="fixed h-screen w-0 lg:w-64 transition-all py-4 pl-4 overflow-auto">
        <aside class="bg-black rounded-xl w-full h-full overflow-auto">
            <header class="h-16 border-b border-gray-800 flex items-center text-white px-6">
                <div class="flex justify-between items-center w-full">
                    <div class="flex flex-col">
                        <span class="text-sm font-semibold text-gray-200">
                            MyApps
                        </span>
                    </div>
                    <button class="cursor-pointer lg:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler text-gray-400 icons-tabler-outline icon-tabler-x">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M18 6l-12 12" />
                            <path d="M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </header>
            @php
                $collection = collect([
                    ['title' => 'Dashboard', 'route' => 'sellers.dashboard', 'active' => 'dashboard'],
                    ['title' => 'Items', 'route' => 'sellers.items.index', 'active' => 'items'],
                ]);
            @endphp
            <ul class="p-4 text-xs font-bold uppercase space-y-1">
                @foreach ($collection as $item)
                    <li>
                        <a href="{{ route($item['route']) }}" @class([
                            'flex justify-between item-center px-4 py-2 text-gray-200 hover:bg-gray-800 hover:text-white rounded-lg',
                            'bg-gray-800' => request()->segment(2) === $item['active'],
                        ]) wire:navigate>
                            <span>
                                {{ $item['title'] }}
                            </span>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="size-5">
                                    <path fill-rule="evenodd"
                                        d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </aside>
    </div>

    <div id="main-content" class="flex-grow flex ml-64 flex-col">
        <nav class="p-4">
            <div class="bg-white p-4 rounded-xl">
                <div class="grid grid-cols-12 gap-2">
                    <div class="col-span-6 md:col-span-3">
                        <div class="flex justify-start space-x-2 items-center">
                            <!-- Logo -->
                            <div>
                                <x-dropdown align="left" width="48">
                                    <x-slot:trigger>
                                        <button class="bg-blue-50 block text-blue-500 p-1 rounded-lg cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" class="size-5">
                                                <path fill-rule="evenodd"
                                                    d="M2 4.75A.75.75 0 0 1 2.75 4h14.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 4.75ZM2 10a.75.75 0 0 1 .75-.75h14.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 10Zm0 5.25a.75.75 0 0 1 .75-.75h14.5a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1-.75-.75Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </x-slot:trigger>
                                    <x-slot:content>
                                        <x-dropdown-link
                                            href="{{ route('sellers.dashboard') }}">Dashboard</x-dropdown-link>
                                        <x-dropdown-link href="#">Items</x-dropdown-link>
                                        <x-dropdown-link href="#">Products</x-dropdown-link>
                                        <x-dropdown-link href="#">Sales</x-dropdown-link>
                                        <x-dropdown-link href="#">Claims</x-dropdown-link>
                                        <x-dropdown-link href="#">Returns</x-dropdown-link>
                                        <x-dropdown-link href="#">Refunds</x-dropdown-link>
                                        <x-dropdown-link href="#">Replacements</x-dropdown-link>
                                        <x-dropdown-link href="#">Customers</x-dropdown-link>
                                    </x-slot:content>
                                </x-dropdown>
                            </div>
                            <a href="{{ route('sellers.dashboard') }}" class="text-lg font-semibold text-gray-700">
                                MyApp's
                            </a>
                        </div>
                    </div>
                    <!-- Cart Icon -->
                    <div class="col-span-6 md:col-span-3 md:order-last">
                        <div class="flex space-x-1 justify-end">
                            <!-- Cart Icon -->
                            <x-dropdown width="48">
                                <x-slot:trigger>
                                    <button class="bg-blue-50 block text-blue-500 p-1 rounded-lg cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6 text-blue-600">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                    </button>
                                </x-slot:trigger>
                                <x-slot:content>
                                    <x-dropdown-link href="">Profile</x-dropdown-link>
                                    <x-dropdown-link href="{{ route('sellers.logout') }}">Logout</x-dropdown-link>
                                </x-slot:content>
                            </x-dropdown>
                            </a>
                        </div>
                    </div>
                    <!-- Search Bar -->
                    <div class="col-span-12 md:col-span-6">
                        <div class="flex items-center space-x-1">
                            <input type="text" class="w-full p-1 border border-gray-300 rounded-lg"
                                placeholder="Search...">
                            <button class="bg-blue-50 text-white p-1 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6 text-blue-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <main class="flex-grow min-h-96">
            {{ $slot }}
        </main>
        <footer class="mx-auto px-4 p-4 w-full ">
            <div class="bg-gray-300 rounded-xl">

                <ul
                    class="px-4 py-4 text-sm text-gray-800 flex flex-col justify-center items-center md:flex-row md:justify-between md:items-center space-y-1">
                    <li class="font-bold">
                        &copy; {{ date('Y') }} MyApp. All rights reserved.
                    </li>
                    <li class="text-gray-700 text-xs">
                        Hecho con ❤️ en Puerto Rico
                    </li>
                </ul>
            </div>
        </footer>
    </div>
    @stack('scripts')
    @livewireScripts
</body>

</html>
