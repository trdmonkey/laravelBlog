@extends('layouts.app')

@section('title', 'Editar Post')

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow-xl rounded-2xl p-8">
    <h1 class="text-3xl font-bold text-indigo-600 mb-6 flex items-center gap-2">
        <i class="fas fa-edit text-indigo-600"></i> Editar Post
    </h1>

    <form action="{{ route('posts.update', $post) }}" method="POST" class="space-y-6" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Título -->
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Título</label>
            <input type="text" name="title" id="title"
                value="{{ old('title', $post->title) }}"
                class="p-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-300 sm:text-sm"
                required>
            @error('title')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Contenido -->
        <div>
            <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Contenido</label>
            <textarea name="content" id="content" rows="5"
                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-300 sm:text-sm"
                required>{{ old('content', $post->content) }}</textarea>
            @error('content')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label class="block text-sm font-medium text-slate-700">Archivo multimedia</label>
            <input type="file" name="media" 
                class="mt-1 block w-full border border-slate-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            <p class="text-xs text-slate-500 mt-1">Puedes subir imagen, GIF o video (mp4).</p>
        </div>

        <!-- Botones -->
        <div class="flex items-center justify-between">
            <a href="{{ route('posts.index') }}"
               class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 transition-colors no-underline">
                <i class="fas fa-arrow-left"></i> Cancelar
            </a>
            <button type="submit"
                class="inline-flex items-center gap-2 px-6 py-2 text-sm font-medium text-white bg-indigo-600 rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none transition-colors">
                <i class="fas fa-save"></i> Guardar Cambios
            </button>
        </div>
    </form>
</div>
@endsection
