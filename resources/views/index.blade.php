<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Anicom-test-app</title>
</head>
<body>
    <main class="grid grid-cols-2">
        <aside class="bg-gray flex flex-col max-w-sm min-h-screen gap-2">
            <p>123</p>
            <p>123</p>
            <p>123</p>
            <p>123</p>
            <p>123</p>
            <p>123</p>
            <p>123</p>
        </aside>
        <section>
            @yield('content')
        </section>
    </main>
</body>
</html>
