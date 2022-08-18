<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Anicom-test-app</title>
</head>
<body class="bg-gray-300">
<header class="bg-white">
    <nav class="p-4 flex justify-center gap-4">
        <a href="{{ route('categories.index') }}" class="text-xl hover:underline decoration-sky-400 decoration-2">Категории</a>
        <a href="{{ route('products.index') }}" class="text-xl hover:underline decoration-sky-400 decoration-2">Товары</a>
    </nav>
</header>
<main class="grid m-auto mt-8">
    @yield('content')
</main>
</body>
</html>
