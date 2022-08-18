@if ($errors->any())
    <div class="bg-red-500 border border-red-600 p-1 rounded text-white">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<f-field class="grid gap-1">
    <label for="title">Название товара</label>
    <input class="input" type="text" name="title" placeholder="Название товара" value="{{ old('title') ?? $product->title ?? '' }}">
</f-field>
<f-field class="grid gap-1">
    <label for="price">Цена</label>
    <input class="input" type="text" id="price" name="price" placeholder="Цена товара" value="{{ old('price') ?? $product->price ?? '' }}">
</f-field>
<f-field class="grid gap-1">
    <label for="category">Категория</label>
    <select class="input" name="category_id" id="category">
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->title }}</option>
        @endforeach
    </select>
</f-field>
<f-field class="grid gap-1">
    <label for="description">Описание товара</label>
    <textarea name="description" id="description" class="input">{!! old('description') ?? $product->description ?? '' !!}</textarea>
</f-field>
<f-field class="grid gap-1">
    <label for="image">Фотография</label>
    <input type="file" name="image">
</f-field>
