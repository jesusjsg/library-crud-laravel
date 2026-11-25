<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    public function store(StoreCategoryRequest $request): RedirectResponse|JsonResponse
    {
        $category = Category::create($request->validated());

        if ($request->expectsJson()) {
            return response()->json($category, 201);
        }

        return redirect()->route('books.index')->with('success', 'Categoría creada correctamente.');
    }

    public function destroy(Request $request, Category $category): RedirectResponse|JsonResponse|Response
    {
        if ($category->books()->exists()) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'No se puede eliminar una categoría con libros asociados.'], 409);
            }

            return redirect()->route('books.index')->with('error', 'No se puede eliminar la categoría porque tiene libros asociados.');
        }

        $category->delete();

        if ($request->expectsJson()) {
            return response()->noContent();
        }

        return redirect()->route('books.index')->with('success', 'Categoría eliminada correctamente.');
    }
}
