<!doctype html>
<html>
<head>
    <title>Detalle del Post</title>
    <meta charset="utf-8"><title>{{ $post->title }}</title></head>
<body>
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <p><a href="{{ route('posts.index') }}">Volver</a> | <a href="{{ route('posts.edit', $post) }}">Editar</a></p>
</body>
</html>
