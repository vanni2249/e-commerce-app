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
    <div id="sidebar" class="fixed h-screen w-0 lg:w-64 transition-all overflow-auto">
        @livewire('sellers.layout.sidebar')
    </div>

    <div id="main-content" class="flex-grow flex ml-64 transition-all flex-col">
        @livewire('sellers.layout.navbar')
        <main class="flex-grow min-h-96 p-4">
            {{ $slot }}
        </main>
        <footer class=" w-full ">
            <div>
                <ul class="p-4 text-sm text-gray-500 flex justify-center items-center">
                    <li class="font-bold">
                        &copy; {{ date('Y') }} Zierra. All rights reserved.
                    </li>
                    {{-- <li class="text-gray-700 text-xs">
                        Hecho con ❤️ en Puerto Rico
                    </li> --}}
                </ul>
            </div>
        </footer>
    </div>
    @stack('scripts')
    @livewireScripts
</body>

</html>
