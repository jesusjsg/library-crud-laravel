<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            ['El Quijote', 'Miguel de Cervantes', 1605, 'Ficción', 'Novela fundacional de la literatura española.'],
            ['Cien años de soledad', 'Gabriel García Márquez', 1967, 'Ficción', 'Realismo mágico en Macondo.'],
            ['Clean Code', 'Robert C. Martin', 2008, 'Programación', 'Buenas prácticas de código en Java.'],
            ['The Pragmatic Programmer', 'Andrew Hunt', 1999, 'Programación', 'Guía práctica para desarrolladores.'],
            ['Laravel Up and Running', 'Matt Stauffer', 2017, 'Programación', 'Guía completa del framework Laravel.'],
            ['La Segunda Guerra Mundial', 'Antony Beevor', 2012, 'Historia', 'Cronología global del conflicto.'],
            ['La conquista del Imperio Romano', 'Adrian Goldsworthy', 2009, 'Historia', 'Historia de la expansión romana.'],
            ['Breve historia del tiempo', 'Stephen Hawking', 1988, 'Ciencia', 'Introducción a la cosmología.'],
            ['El origen de las especies', 'Charles Darwin', 1859, 'Ciencia', 'Fundamentos de la teoría evolutiva.'],
            ['Cosmos', 'Carl Sagan', 1980, 'Ciencia', 'Viaje por el universo y la ciencia.'],
            ['El principito', 'Antoine de Saint-Exupéry', 1943, 'Infantil', 'Clásico sobre amistad y humanidad.'],
            ['Alice en el país de las maravillas', 'Lewis Carroll', 1865, 'Infantil', 'Aventura onírica de Alice.'],
            ['1984', 'George Orwell', 1949, 'Ficción', 'Distopía sobre el totalitarismo.'],
            ['Dune', 'Frank Herbert', 1965, 'Ficción', 'Épica ciencia ficción en Arrakis.'],
            ['Design Patterns', 'Erich Gamma', 1994, 'Programación', 'Patrones de diseño en orientación a objetos.'],
            ['El nombre de la rosa', 'Umberto Eco', 1980, 'Ficción', 'Novela policiaca medieval.'],
        ];

        foreach ($books as [$title, $author, $year, $categoryName, $description]) {
            $category = Category::where('name', $categoryName)->firstOrFail();

            Book::create([
                'title' => $title,
                'author' => $author,
                'published_year' => $year,
                'category_id' => $category->id,
                'description' => $description,
            ]);
        }
    }
}
