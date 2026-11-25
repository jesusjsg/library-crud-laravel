@extends('layouts.app')

@section('title', 'Libros')

@section('content')
    <div class="card">
        <div class="toolbar">
            <h1>Libros</h1>
            <a href="{{ route('books.create') }}" class="btn btn-primary">+ Nuevo libro</a>
        </div>

        <form method="GET" action="{{ route('books.index') }}" class="filter" style="margin-bottom: 1rem;">
            <label for="category" style="margin: 0;">Categoría:</label>
            <select name="category" id="category">
                <option value="">Todas</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(request('category') == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="btn">Filtrar</button>
            @if (request('category'))
                <a href="{{ route('books.index') }}" class="btn">Limpiar</a>
            @endif
        </form>

        @if ($books->isEmpty())
            <p class="muted">No hay libros registrados.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Año</th>
                        <th>Categoría</th>
                        <th>Descripción</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->published_year }}</td>
                            <td>{{ $book->category->name ?? '—' }}</td>
                            <td class="muted">{{ \Illuminate\Support\Str::limit($book->description, 60) }}</td>
                            <td>
                                <div class="actions">
                                    <a href="{{ route('books.edit', $book) }}" class="btn btn-sm">Editar</a>
                                    <form method="POST" action="{{ route('books.destroy', $book) }}"
                                        onsubmit="return confirm('¿Eliminar este libro?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <div class="card">
        <h2>Nueva categoría</h2>
        <form method="POST" action="{{ route('categories.store') }}" class="form-inline">
            @csrf
            <div class="field">
                <input type="text" name="name" placeholder="Nombre de la categoría"
                    value="{{ old('name') }}" required>
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
@endsection
