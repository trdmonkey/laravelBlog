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

                @if($post->media_type === 'image' || $post->media_type === 'gif')
                    <img src="{{ asset('storage/'.$post->media_url) }}" 
                        alt="Imagen del post"
                        class="w-full h-48 object-cover rounded-lg mb-4">
                @elseif($post->media_type === 'video')
                    <video controls class="w-full rounded-lg mb-4">
                        <source src="{{ asset('storage/'.$post->media_url) }}" type="video/mp4">
                        Tu navegador no soporta el video.
                    </video>
                @endif

                <!-- Icono y título -->
                <div class="flex items-center gap-3 mb-3">
                    <div class="p-2 rounded-full bg-blue-100 text-gray-600">
                        <i class="fa-solid fa-hand-holding-heart"></i>
                        <!-- <i class="fa-solid fa-hand-holding-heart"></i> // Otra opcion -->
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
                        class="inline-flex items-center gap-2 px-4 py-1.5 text-sm rounded-md bg-green-600 text-white hover:bg-green-800 transition no-underline">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>

                        <!-- Botón que abre modal -->
                        <button type="button" 
                            onclick="document.getElementById('deleteModal-{{ $post->id }}').classList.remove('hidden')"
                            class="inline-flex items-center gap-2 px-4 py-1.5 text-sm rounded-md bg-red-500 text-white hover:bg-red-700 transition shadow-md">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modal de confirmación -->
            <div id="deleteModal-{{ $post->id }}" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-6">
                    <h2 class="text-xl font-bold text-slate-900 mb-4">¿Eliminar este post?</h2>
                    <p class="text-slate-600 mb-6">Esta acción no se puede deshacer. ¿Seguro que deseas eliminar <span class="font-semibold">{{ $post->title }}</span>?</p>
                    
                    <div class="flex justify-end gap-3">
                        <!-- Cancelar -->
                        <button type="button" 
                            onclick="document.getElementById('deleteModal-{{ $post->id }}').classList.add('hidden')" 
                            class="px-4 py-2 rounded-lg bg-slate-100 text-slate-700 hover:bg-slate-200 transition">
                            Cancelar
                        </button>
                        
                        <!-- Confirmar eliminación -->
                        <form action="{{ route('posts.destroy', $post) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                class="px-4 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700 transition">
                                Sí, eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
