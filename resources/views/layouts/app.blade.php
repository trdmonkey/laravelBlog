<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Mi Blog')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>

</head>
<body class="bg-gray-50 text-gray-900 flex flex-col min-h-screen font-sans">

    <!-- Navbar -->
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ route('posts.index') }}" 
               class="text-2xl font-extrabold text-blue-600 tracking-tight hover:text-blue-700 transition no-underline">
                Mi Blog
            </a>
            <div class="flex items-center space-x-6">
                <a href="{{ route('posts.index') }}" 
                   class="text-gray-700 hover:text-blue-600 font-medium transition no-underline">Posts</a>
                <a href="{{ route('posts.create') }}" 
                   class="bg-blue-600 text-white px-4 py-2 rounded-lg font-medium shadow hover:bg-blue-700 transition no-underline">
                   <i class="fa-solid fa-hand"></i> Crear Post
                </a>
            </div>
        </div>
    </nav>

    <!-- Contenido -->
    <main class="container mx-auto px-6 py-12 flex-1">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-400 text-center py-3 text-sm">
        © {{ date('Y') }} <span class="text-white font-semibold">Mi Blog</span> — Todos los derechos reservados
    </footer>

</body>
</html>
