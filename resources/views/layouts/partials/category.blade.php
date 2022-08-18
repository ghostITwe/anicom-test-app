<section class="grid">
    <a href="{{ route('category.get_products', $category->title) }}"
       class="@if($category->isRoot()) font-bold @endif text-2xl px-12 py-2 hover:bg-sky-400">{{ $category->title }}</a>
    @forelse($category->children as $category)
        @include('layouts.partials.category', $category)
    @empty
    @endforelse
</section>
