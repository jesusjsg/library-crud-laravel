@extends('layouts.app')

@section('title', 'Nuevo libro')

@section('content')
    <div class="card" style="max-width: 640px;">
        <h1>Nuevo libro</h1>
        <form method="POST" action="{{ route('books.store') }}">
            @include('books._form', ['submitLabel' => 'Crear libro'])
        </form>
    </div>
@endsection
