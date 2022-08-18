<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Anicom-test-app</title>
</head>
<body>
<main class="flex justify-center mt-8">
    <form class="bg-white grid gap-4 rounded-xl shadow-lg p-4" action="{{ route('login.auth') }}" method="post">
        <h1 class="text-2xl text-center">Вход</h1>
        @if ($errors->any())
            <div class="bg-red-500 border border-red-600 p-1 rounded text-white">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @csrf
        <f-field class="grid gap-1">
            <label for="name">Логин</label>
            <input type="text" id="name" name="login"
                   class="border border-gray-300 placeholder-gray-500 text-gray-900 rounded p-1">
        </f-field>
        <f-field class="grid gap-1">
            <label for="password">Пароль</label>
            <input type="password" id="password" name="password"
                   class="border border-gray-300 placeholder-gray-500 text-gray-900 rounded p-1">
        </f-field>
        <f-field class="grid gap-1">
            <button class="rounded bg-sky-600 hover:bg-sky-500 text-white shadow-lg shadow-sky-600/50 p-2">Войти
            </button>
        </f-field>
    </form>
</main>
</body>
</html>
