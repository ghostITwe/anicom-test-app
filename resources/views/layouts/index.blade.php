<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Anicom-test-app</title>
</head>
<body class="flex">
<aside class="bg-gray-300 w-96 min-h-screen shrink-0 py-12">
    @include('layouts.navigation')
</aside>
<main class="p-16">
    @yield('content')
</main>
</body>
</html>
