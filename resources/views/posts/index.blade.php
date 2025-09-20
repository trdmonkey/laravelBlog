<!DOCTYPE html>
<html>
<head>
    <title>Lista de Posts</title>
</head>
<body>
    <h1>Posts del Blog</h1>
    <ul>
        @foreach ($posts as $post)
            <li>{{ $post->title }} - {{ $post->content }}</li>
        @endforeach
    </ul>
</body>
</html>
