<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class BookController extends Controller
{
    public function index(Request $request): View|JsonResponse
    {
        $query = Book::query()->with('category');

        if ($request->filled('category')) {
            $query->where('category_id', $request->integer('category'));
        }

        $books = $query->get();

        if ($request->expectsJson()) {
            return response()->json($books);
        }

        return view('books.index', [
            'books' => $books,
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function create(): View
    {
        return view('books.create', [
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function store(StoreBookRequest $request): RedirectResponse|JsonResponse
    {
        $book = Book::create($request->validated());

        if ($request->expectsJson()) {
            return response()->json($book, 201);
        }

        return redirect()->route('books.index')->with('success', 'Libro creado correctamente.');
    }

    public function edit(Book $book): View
    {
        return view('books.edit', [
            'book' => $book,
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function update(UpdateBookRequest $request, Book $book): RedirectResponse|JsonResponse
    {
        $book->update($request->validated());

        if ($request->expectsJson()) {
            return response()->json($book);
        }

        return redirect()->route('books.index')->with('success', 'Libro actualizado correctamente.');
    }

    public function destroy(Request $request, Book $book): RedirectResponse|Response
    {
        $book->delete();

        if ($request->expectsJson()) {
            return response()->noContent();
        }

        return redirect()->route('books.index')->with('success', 'Libro eliminado correctamente.');
    }
}
