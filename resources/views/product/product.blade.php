@extends('layouts.index')

@section('content')
    <a href="{{ route('index') }}" class="text-xl underline hover:decoration-sky-400 decoration-2">Назад</a>
    <article class="grid grid-cols-2 gap-12 mt-16">
        <figure class="aspect-square">
            <img class="object-cover w-full h-full"
                 src="{{ asset(Storage::url($product->image))}}"
                 alt="{{ $product->title }}">
        </figure>
        <article>
            <header class="flex justify-between">
                <h1 class="text-4xl font-bold">{{ $product->title }}</h1>
                <p class="text-4xl">{{ $product->getPrice() }} руб.</p>
            </header>
            <p class="mt-16 text-xl">{{ $product->description }}</p>
        </article>

    </article>
@endsection
