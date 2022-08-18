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
    <label for="title">Название категории</label>
    <input class="input" type="text" id="title" name="title" value="{{ old('title') ?? $category->title ?? '' }}">
</f-field>
<f-field class="grid gap-1">
    <label for="parent_id">Родительская категория</label>
    <select class="input" name="parent_id" id="parent_id">
        <option value="null">Без родительской категории</option>
        @include('admin.category._category')
    </select>
</f-field>
