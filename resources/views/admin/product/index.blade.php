@extends('admin.dashboard')

@section('content')
    <nav class="flex ml-8">
        <a href="{{ route('products.create') }}" class="bg-emerald-600 rounded-2xl text-white p-2">Добавить товар</a>
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
            <th>Фото</th>
            <th>Название</th>
            <th>Категория</th>
            <th>Цена</th>
        </tr>
        </thead>
        <tbody>
        @forelse($products as $product)
            <tr>
                <td class="text-base sm:text-xl">{{ $product->id }}</td>
                <td class="text-base sm:text-xl">
                    <img src="{{ asset(Storage::url($product->image)) }}" alt="{{ $product->title }}">
                </td>
                <td class="text-base sm:text-xl ">{{ $product->title }}</td>
                <td class="text-base sm:text-xl ">{{ $product->category->title }}</td>
                <td class="text-base sm:text-xl ">{{ $product->getPrice() }} руб.</td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}">
                        @include('layouts.svg.edit')
                    </a>
                </td>
                <td>
                    <form action="{{ route('products.destroy', $product->id) }}" method="post">
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
