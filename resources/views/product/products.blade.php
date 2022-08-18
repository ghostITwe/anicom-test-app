@extends('layouts.index')

@section('content')
    <h1 class="text-4xl font-bold">{{ $category->title }}</h1>
    <nav class="mt-6">
        @foreach($breadcrumbs as $breadcrumb)
        <a href="{{ route('category.get_products', $breadcrumb->title) }}" class="hover:underline decoration-sky-400 decoration-2">{{ $breadcrumb->title }}</a> @if(!$loop->last) / @endif
        @endforeach
    </nav>
    <section class="grid grid-cols-3 gap-12 mt-12">
        @forelse($products as $product)
            <article class="hover:bg-gray-100 p-4 duration-200">
                <a href="{{ route('product.get_product', $product->id) }}">
                    <figure class="aspect-square">
                        <img class="object-cover w-full h-full"
                             src="{{ asset(Storage::url($product->image))}}"
                             alt="{{ $product->title }}">
                    </figure>
                    <section class="flex justify-between mt-6">
                        <h2 class="font-bold text-xl">{{ $product->title }}</h2>
                        <p class="text-xl">{{ $product->getPrice()  }} руб.</p>
                    </section>
                </a>
            </article>
        @empty
            <article>
                <h1 class="text-4xl font-bold">Извините продуктов нет</h1>
            </article>
        @endforelse
    </section>
@endsection
