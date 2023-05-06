<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100" style="background:url({{ asset('img/d48c05c48ffa2ca7f2fe1eddc9d13c40.jpeg') }}); background-position: center; background-size:cover; background-repeat: no-repeat;">
        <div class="bg-white p-3 rounded-3xl shadow-sm">
            @if(URL::current() == url('/sle/login'))
            <a href="/admins">
                <h1 class="text-lg font-bold text-[#b00000]">Login, to your Sle Dashboard</h1>
            </a>
            @elseif(URL::current() == url('/sle/register'))
            <a href="/admins">
                <h1 class="text-lg font-bold text-[#b00000]">Register, to access Sle Dashboard</h1>
            </a>
            @endif
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
