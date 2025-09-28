@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-8">Crear Nuevo Post</h1>

    <!-- Mensajes de validación -->
    @if ($errors->any())
        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST" class="bg-white p-8 shadow rounded-xl">
        @csrf

        <!-- Título -->
        <div class="mb-6">
            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Título</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}"
                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 px-4 py-2">
        </div>

        <!-- Contenido -->
        <div class="mb-6">
            <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Contenido</label>
            <textarea name="content" id="content" rows="6"
                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 px-4 py-2">{{ old('content') }}</textarea>
        </div>

        <!-- Botones -->
        <div class="flex justify-end space-x-4">
            <a href="{{ route('posts.index') }}"
                class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 transition no-underline">
                Cancelar
            </a>
            <button type="submit"
                class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition font-medium">
                Guardar
            </button>
        </div>
    </form>
</div>
@endsection
