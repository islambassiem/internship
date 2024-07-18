<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'Internship' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="{{ Vite::asset('resources/images/logo.png') }}" rel="icon">
    @livewireStyles()
    @vite('resources/css/app.css')
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <main class="bg-gradient-to-t from-cyan-400 to-red-400 w-full h-screen flex justify-center items-center">
        <div class="mx-auto w-96 bg-white shadow-2xl">
            <div class="flex justify-center mt-7">
                <x-icons.logo></x-icons.logo>
            </div>
            {{ $slot }}
        </div>
    </main>
    @livewireScripts()
</body>

</html>
