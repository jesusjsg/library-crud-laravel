<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Biblioteca')</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: system-ui, -apple-system, sans-serif; background: #f5f6f8; color: #1f2430; line-height: 1.5; }
        header { background: #1f2430; color: #fff; padding: 1rem 2rem; }
        header a { color: #fff; text-decoration: none; font-weight: 600; }
        main { max-width: 960px; margin: 2rem auto; padding: 0 1rem; }
        .card { background: #fff; border: 1px solid #e2e4ea; border-radius: 8px; padding: 1.5rem; margin-bottom: 1.5rem; }
        h1 { font-size: 1.5rem; margin-bottom: 1rem; }
        h2 { font-size: 1.1rem; margin-bottom: 0.75rem; }
        table { width: 100%; border-collapse: collapse; }
        th, td { text-align: left; padding: 0.6rem 0.5rem; border-bottom: 1px solid #e9eaef; vertical-align: top; }
        th { font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.04em; color: #6b7280; }
        tr:last-child td { border-bottom: none; }
        .btn { display: inline-block; padding: 0.45rem 0.9rem; border-radius: 6px; border: 1px solid #d0d3db; background: #fff; color: #1f2430; font-size: 0.9rem; text-decoration: none; cursor: pointer; }
        .btn:hover { background: #f0f1f4; }
        .btn-primary { background: #2563eb; border-color: #2563eb; color: #fff; }
        .btn-primary:hover { background: #1d4ed8; }
        .btn-danger { color: #b91c1c; border-color: #f0c2c2; }
        .btn-danger:hover { background: #fef2f2; }
        .btn-sm { padding: 0.25rem 0.6rem; font-size: 0.85rem; }
        .actions { display: flex; gap: 0.4rem; align-items: center; }
        .flash { padding: 0.75rem 1rem; border-radius: 6px; margin-bottom: 1rem; font-size: 0.95rem; }
        .flash-success { background: #ecfdf5; border: 1px solid #a7f3d0; color: #065f46; }
        .flash-error { background: #fef2f2; border: 1px solid #fecaca; color: #991b1b; }
        label { display: block; font-weight: 600; font-size: 0.9rem; margin-bottom: 0.3rem; }
        .field { margin-bottom: 1rem; }
        input[type="text"], input[type="number"], select, textarea { width: 100%; padding: 0.5rem 0.65rem; border: 1px solid #d0d3db; border-radius: 6px; font-size: 0.95rem; font-family: inherit; }
        textarea { min-height: 100px; resize: vertical; }
        .error { color: #b91c1c; font-size: 0.85rem; margin-top: 0.25rem; }
        .toolbar { display: flex; justify-content: space-between; align-items: center; gap: 1rem; margin-bottom: 1rem; flex-wrap: wrap; }
        .filter { display: flex; gap: 0.5rem; align-items: center; }
        .filter select { width: auto; }
        .muted { color: #6b7280; font-size: 0.9rem; }
        .form-inline { display: flex; gap: 0.5rem; align-items: flex-end; }
        .form-inline .field { margin-bottom: 0; flex: 1; }
    </style>
</head>
<body>
    <header>
        <a href="{{ route('books.index') }}">📚 Biblioteca</a>
    </header>
    <main>
        @if (session('success'))
            <div class="flash flash-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="flash flash-error">{{ session('error') }}</div>
        @endif
        @yield('content')
    </main>
</body>
</html>
