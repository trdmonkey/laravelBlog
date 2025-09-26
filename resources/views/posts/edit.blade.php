<!doctype html>
<html>
<head><meta charset="utf-8"><title>Editar {{ $post->title }}</title></head>
<body>
    <h1>Editar Post</h1>

    @if ($errors->any())
        <div style="color:red">
            <ul>@foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach</ul>
        </div>
    @endif

    <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')
        <div><label>Título</label><br><input type="text" name="title" value="{{ old('title', $post->title) }}"></div>
        <div><label>Contenido</label><br><textarea name="content">{{ old('content', $post->content) }}</textarea></div>
        <button type="submit">Actualizar</button>
    </form>

    <p><a href="{{ route('posts.show', $post) }}">Cancelar</a></p>
</body>
</html>
