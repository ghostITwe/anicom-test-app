@extends('index')

@section('content')
    @forelse($products as $product)
        <article class="">

            <p>{{ $product->title }}</p>
            <p>{{ $product->getPrice() }}</p>
        </article>
    @empty
        <div>
            <p>Продуктов нет</p>
        </div>
    @endforelse
@endsection
