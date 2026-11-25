@extends('layouts.app')

@section('title', 'Editar libro')

@section('content')
    <div class="card" style="max-width: 640px;">
        <h1>Editar libro</h1>
        <form method="POST" action="{{ route('books.update', $book) }}">
            @method('PUT')
            @include('books._form', ['submitLabel' => 'Guardar cambios'])
        </form>
    </div>
@endsection
