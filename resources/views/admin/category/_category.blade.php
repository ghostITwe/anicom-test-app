@foreach($categories as $categoryItem)
    <option value="{{ $categoryItem->id ?? ''}}">
        {{ $delimiter ?? '' }} {{ $categoryItem->title ?? '' }}
    </option>

    @isset($categoryItem->children)
        @include('admin.category._category', [
            'categories' => $categoryItem->children,
            'delimiter' => ' - ' . $delimiter
        ])
    @endisset
@endforeach
