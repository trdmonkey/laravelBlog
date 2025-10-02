@extends('layouts.app')

@section('title', 'Detalle del Post')

@section('content')
<div class="max-w-3xl mx-auto px-6 py-10 bg-white rounded-2xl shadow-lg">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">

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

        <h1 class="text-3xl font-extrabold text-slate-900 flex items-center gap-3">
            <i class="fa-regular fa-file-lines text-blue-600"></i>
            {{ $post->title }}
        </h1>
        <div class="flex gap-2">
            <!-- Editar -->
            <a href="{{ route('posts.edit', $post) }}" 
               class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-slate-100 text-slate-700 hover:bg-blue-600 hover:text-white transition shadow-sm no-underline">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>

            <!-- Botón que abre modal -->
            <button onclick="document.getElementById('deleteModal').classList.remove('hidden')" 
                class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700 transition shadow-md">
                <i class="fa-solid fa-trash"></i>
            </button>
        </div>
    </div>

    <!-- Contenido -->
    <div class="prose max-w-none text-slate-700 leading-relaxed">
        {{ $post->content }}
    </div>

    <!-- Footer -->
    <div class="mt-8">
        <a href="{{ route('posts.index') }}" 
           class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg bg-blue-600 text-white font-medium shadow hover:bg-blue-700 transition no-underline">
            <i class="fa-solid fa-arrow-left"></i>
            Volver al listado
        </a>
    </div>
</div>

<!-- Modal de confirmación -->
<div id="deleteModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-6">
        <h2 class="text-xl font-bold text-slate-900 mb-4">¿Eliminar este post?</h2>
        <p class="text-slate-600 mb-6">Esta acción no se puede deshacer. ¿Seguro que deseas continuar?</p>
        
        <div class="flex justify-end gap-3">
            <!-- Cancelar -->
            <button type="button" onclick="document.getElementById('deleteModal').classList.add('hidden')" 
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
@endsection
