<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Crear Post | Mi Blog</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('posts.index') }}">📝 Mi Blog</a>
        </div>
    </nav>

    <!-- Contenedor -->
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-body">
                <h1 class="mb-4">➕ Crear nuevo post</h1>

                <!-- Validación -->
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Formulario -->
                <form action="{{ route('posts.update', $post) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Título</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title', $post->title) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Contenido</label>
                        <textarea class="form-control" name="content" required>{{ old('content', $post->content) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-success">💾 Guardar</button>
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary">⬅️ Cancelar</a>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
