<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Crear nuevo Post</title>
</head>
<body>
    <h1>Crear un nuevo Post</h1>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <p>
            <label for="title">Título:</label><br>
            <input type="text" name="title" id="title">
        </p>
        <p>
            <label for="content">Contenido:</label><br>
            <textarea name="content" id="content"></textarea>
        </p>
        <button type="submit">Guardar</button>
    </form>

    <p><a href="{{ route('posts.index') }}">Volver a la lista</a></p>
</body>
</html>
