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

<body class="bg-gray-200 font-sans flex flex-col items-center px-4 py-24 md:py-32 min-h-screen">
    <header class="mb-6">
        @if(in_array(request()->segment(1), ['login', 'register', 'password/reset']))
                <a href="/" class="text-2xl font-bold">Myapp's</a>
        @endif
    </header>
    {{ $slot }}
    @livewireScripts
</body>

</html>
