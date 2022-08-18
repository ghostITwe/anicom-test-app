<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Изменение категории</title>
</head>
<body class="centered-page">
<form class="centered-form p-4 sm:p-8" action="{{ route('categories.update', $category->id) }}" method="post" enctype="multipart/form-data">
    <a class="text-xl hover:underline decoration-sky-400 decoration-2" href="{{ route('categories.index') }}">Вернуться обратно</a>
    @csrf
    @include('admin.category._form')
    <button class="border-2 bg-emerald-600 p-2 rounded-xl text-white">Изменить</button>
</form>
</body>
</html>

