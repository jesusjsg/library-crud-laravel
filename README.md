# Biblioteca CRUD

Pequeña aplicación en Laravel para gestionar libros y categorías: listar, crear, editar, eliminar y filtrar libros por categoría. Funciona desde el navegador (vistas Blade) y como API JSON.

## Requisitos

- PHP 8.3+
- Composer
- Node.js (solo para compilar los assets)

## Levantarlo en local

```bash
composer setup
```

Ese script instala dependencias, genera el `.env`, crea la clave, migra y compila los assets. Después solo falta:

```bash
php artisan dev
```

Abre [http://127.0.0.1:8000](http://127.0.0.1:8000).

## Base de datos

Usa SQLite por defecto, así que no hay que configurar nada externo. Si requieren datos de ejemplo:

```bash
php artisan migrate:fresh --seed
```

## Tests

```bash
composer test
```

## Endpoints

| Método | Ruta | Descripción |
|--------|------|-------------|
| GET | `/books` | Lista libros (acepta `?category={id}`) |
| POST | `/books` | Crea un libro |
| PUT | `/books/{id}` | Actualiza un libro |
| DELETE | `/books/{id}` | Elimina un libro |
| POST | `/categories` | Crea una categoría |
| DELETE | `/categories/{id}` | Elimina una categoría (409 si tiene libros) |

