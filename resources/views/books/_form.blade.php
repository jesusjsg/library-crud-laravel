@csrf

<div class="field">
    <label for="title">Título *</label>
    <input type="text" id="title" name="title" value="{{ old('title', $book->title ?? '') }}" required>
    @error('title')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<div class="field">
    <label for="author">Autor *</label>
    <input type="text" id="author" name="author" value="{{ old('author', $book->author ?? '') }}" required>
    @error('author')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<div class="field">
    <label for="published_year">Año de publicación *</label>
    <input type="number" id="published_year" name="published_year" min="1000" max="2100"
        value="{{ old('published_year', $book->published_year ?? '') }}" required>
    @error('published_year')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<div class="field">
    <label for="category_id">Categoría *</label>
    <select id="category_id" name="category_id" required>
        <option value="">Selecciona una categoría</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                @selected(old('category_id', $book->category_id ?? null) == $category->id)>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    @error('category_id')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<div class="field">
    <label for="description">Descripción</label>
    <textarea id="description" name="description">{{ old('description', $book->description ?? '') }}</textarea>
    @error('description')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<div class="actions">
    <button type="submit" class="btn btn-primary">{{ $submitLabel }}</button>
    <a href="{{ route('books.index') }}" class="btn">Cancelar</a>
</div>
