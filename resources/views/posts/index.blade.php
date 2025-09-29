@extends('layouts.app')

@section('title', 'Lista de Posts')

@section('content')
<div class="max-w-7xl mx-auto px-6">
    
    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-center mb-10">
        <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight mb-4 sm:mb-0">
            Posts del Blog
        </h1>
        <a href="{{ route('posts.create') }}" 
           class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg bg-blue-600 text-white font-medium shadow hover:bg-blue-700 transition no-underline">
            <i class="fa-regular fa-hand"></i>
            Nuevo Post
        </a>
    </div>

    <!-- Posts grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($posts as $post)
            <div class="bg-white rounded-2xl shadow-xl hover:shadow-lg transition p-6 flex flex-col">
                <!-- Icono y título -->
                <div class="flex items-center gap-3 mb-3">
                    <div class="p-2 rounded-full bg-blue-100 text-gray-600">
                        <i class="fa-solid fa-bowling-ball"></i>
                    </div>
                    <h2 class="text-xl font-semibold text-slate-600">{{ $post->title }}</h2>
                </div>

                <!-- Contenido -->
                <p class="text-slate-600 flex-1 mb-6 line-clamp-3">{{ $post->content }}</p>

                <!-- Footer de card -->
                <div class="flex justify-between items-center border-t border-blue-400 pt-4">
                    <!-- Ver -->
                    <a href="{{ route('posts.show', $post) }}" 
                    class="text-blue-600 hover:text-blue-800 font-medium no-underline">
                    Leer más
                    </a>

                    <div class="flex gap-2">
                        <!-- Editar -->
                        <a href="{{ route('posts.edit', $post) }}" 
                        class="inline-flex items-center gap-2 px-4 py-1.5 text-sm rounded-md bg-green-600 text-white hover:bg-green-800 hover:text-white transition no-underline">
                        <i class="fa-solid fa-pen-to-square"></i>
                        
                        </a>

                        <!-- Eliminar -->
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este post?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                class="inline-flex items-center gap-2 px-4 py-1.5 text-sm rounded-md bg-red-500 text-white hover:bg-red-700 transition shadow-md">
                                <i class="fa-solid fa-trash"></i>
                                
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
