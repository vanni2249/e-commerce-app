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

    <div id="main-content" class="flex-grow flex lg:ml-64 transition-all flex-col">
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
    <script>
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');
        const toggleButton = document.getElementById('toggleButton');
        const closeButtonMobile = document.getElementById('closeButtonMobile');

        toggleButton.addEventListener('click', function() {
            // Check if is lg screen
            if (window.innerWidth >= 1024) {
                sidebar.classList.toggle('lg:w-64');
                mainContent.classList.toggle('lg:ml-64');
            } else {
                sidebar.classList.toggle('w-0');
                sidebar.classList.toggle('w-64');
                mainContent.classList.toggle('lg:ml-0');
            }
        });

        closeButtonMobile.addEventListener('click', function() {
            if (window.innerWidth < 1024) {
                sidebar.classList.add('w-0');
                sidebar.classList.remove('w-64');
                mainContent.classList.add('lg:ml-0');
                mainContent.classList.remove('lg:ml-64');
            }
        });
    </script>
</body>

</html>
