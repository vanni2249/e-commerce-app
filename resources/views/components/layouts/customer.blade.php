<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome</title>

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
    <!-- NavBar -->
    @livewire('users.layout.navbar')

    <div class="h-screen flex flex-col max-w-7xl mx-auto space-y-4 p-4">
        <!-- Page Content -->
        <!-- Main -->
        <main class="grow">
            {{ $slot }}
        </main>
        <!-- Footer -->
        <footer class="">
            <div
                class="bg-gray-200 rounded-xl p-4 flex flex-col md:flex-row justify-between items-center space-y-2 md:space-y-0">
                <p class="text-sm text-gray-800">&copy; {{ date('Y') }} Your Company. All rights reserved.</p>
                <a href="#" class="text-sm text-gray-800 hover:text-gray-900">Terms and conditions</a>
            </div>
        </footer>
    </div>
    <!-- Scripts -->
    @stack('scripts')
    @livewireScripts
</body>

</html>
