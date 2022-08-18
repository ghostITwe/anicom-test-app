@extends('admin.dashboard')

@section('content')
    <nav class="flex ml-8">
        <a href="{{ route('categories.create') }}" class="bg-emerald-600 rounded-2xl text-white p-2">Добавить категорию</a>
    </nav>
    @if(session()->get('success'))
        <div class="py-3 px-2 my-2 bg-yellow-300 text-yellow-800 rounded border border-yellow-600" role="alert">
            {{ session()->get('success') }}
        </div>
    @endif
    <table class="mt-8">
        <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
        </tr>
        </thead>
        <tbody>
        @forelse($categories as $category)
            <tr>
                <td class="text-base sm:text-xl">{{ $category->id }}</td>
                <td class="text-base sm:text-xl ">{{ $category->title }}</td>
                <td>
                    <a href="{{ route('categories.edit', $category->id) }}">
                        @include('layouts.svg.edit')
                    </a>
                </td>
                <td>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-red p-2">
                            @include('layouts.svg.delete')
                        </button>

                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">
                    <p>Пусто</p>
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
