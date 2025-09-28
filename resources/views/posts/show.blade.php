<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>{{ $post->title }} | Mi Blog</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('posts.index') }}">📝 Mi Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="{{ route('posts.create') }}" class="btn btn-primary">
                            ➕ Crear post
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido -->
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-body">
                <h1 class="card-title mb-3">{{ $post->title }}</h1>
                <p class="text-muted">
                    📅 Publicado el {{ $post->created_at->format('d/m/Y H:i') }}
                </p>
                <p class="card-text fs-5">{{ $post->content }}</p>

                <div class="mt-4 d-flex gap-2">
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary">⬅️ Volver</a>
                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">✏️ Editar</a>
                    <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('¿Seguro que quieres eliminar este post?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">🗑️ Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
