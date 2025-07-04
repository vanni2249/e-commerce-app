<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    @endif
    @livewireStyles
</head>

<body class="bg-gray-100 font-sans antialiased">
    <div class="h-screen flex flex-col max-w-7xl mx-auto">
        <!-- NavBar -->
        <nav class="p-4">
            <div class="bg-white p-4 rounded-xl">
                <div class="grid grid-cols-12 gap-2">
                    <div class="col-span-6 md:col-span-3">
                        <div class="flex justify-start space-x-2 items-center">
                            <!-- Logo -->
                            <div>
                                @auth
                                <x-dropdown align="left" width="48">
                                    <x-slot:trigger>
                                        <button
                                            class="bg-blue-50 hover:bg-blue-100 block text-white p-1 rounded-lg cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6 text-blue-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                        </button>
                                    </x-slot:trigger>
                                    <x-slot:content>
                                        <x-dropdown-link href="{{ route('orders.index') }}">Orders</x-dropdown-link>
                                        <x-dropdown-link href="{{ route('favorites.index') }}">Favorites
                                        </x-dropdown-link>
                                        <x-dropdown-link href="{{ route('addresses.index') }}">Addresses
                                        </x-dropdown-link>
                                        <x-dropdown-link href="{{ route('profile.index') }}">Profile</x-dropdown-link>
                                        <x-dropdown-link href="{{ route('logout') }}">Logout</x-dropdown-link>
                                    </x-slot:content>
                                </x-dropdown>
                                @else
                                <a href="{{ route('login') }}"
                                    class="bg-blue-50 hover:bg-blue-100 block text-white p-1 rounded-lg cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6 text-blue-500">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </a>
                                @endauth

                            </div>
                            <a href="/" class="text-lg font-semibold text-gray-700">
                                MyApp's
                            </a>
                        </div>
                    </div>
                    <!-- Cart Icon -->
                    <div class="col-span-6 md:col-span-3 md:order-last">
                        <div class="flex space-x-1 justify-end">
                            <!-- Favorite Icon -->
                            <a href="{{ route('favorites.index') }}"
                                class="bg-blue-50 hover:bg-blue-100 text-white p-1 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6 text-blue-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                </svg>

                            </a>
                            <!-- Cart Icon -->
                            @livewire('users.carts.counter-products')
                           
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
        <main class="grow px-4 space-y-4">
            {{ $slot }}
        </main>
        <footer class=" p-4">
            <div class="bg-gray-200 rounded-xl p-4 text-center lg:text-left">
                <p class="text-sm text-gray-600">&copy; {{ date('Y') }} Your Company. All rights reserved.</p>
                <a href="#" class="text-xs text-gray-500 hover:text-gray-600">Terms and conditions</a>
            </div>
        </footer>
    </div>
    @livewireScripts
</body>

</html>