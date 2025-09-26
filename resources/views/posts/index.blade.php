<!doctype html>
<html>
<head><meta charset="utf-8"><title>Posts</title></head>
<body>
    <h1>Posts del Blog</h1>
    <p><a href="{{ route('posts.create') }}">➕ Crear post</a></p>

    @if(session('success'))
        <div style="background:#e6ffed;padding:8px;margin-bottom:12px">{{ session('success') }}</div>
    @endif

    <ul>
        @forelse($posts as $post)
            <li><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></li>
        @empty
            <li>No hay posts aún.</li>
        @endforelse
    </ul>
</body>
</html>

