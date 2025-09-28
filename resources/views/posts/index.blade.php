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
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" 
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Nuevo Post
        </a>
    </div>

    <!-- Posts grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($posts as $post)
            <div class="bg-white rounded-2xl shadow-md hover:shadow-lg transition p-6 flex flex-col">
                <!-- Icono y título -->
                <div class="flex items-center gap-3 mb-3">
                    <div class="p-2 rounded-full bg-blue-100 text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" 
                             viewBox="0 0 24 24" stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                   d="M12 20l9-5-9-5-9 5 9 5z" />
                        </svg>
                    </div>
                    <h2 class="text-xl font-semibold text-slate-800">{{ $post->title }}</h2>
                </div>

                <!-- Contenido -->
                <p class="text-slate-600 flex-1 mb-6 line-clamp-3">{{ $post->content }}</p>

                <!-- Footer de card -->
                <div class="flex justify-between items-center border-t pt-4">
                    <a href="{{ route('posts.show', $post) }}" 
                       class="text-blue-600 hover:text-blue-800 font-medium no-underline">
                       Leer más
                    </a>
                    <a href="{{ route('posts.edit', $post) }}" 
                       class="inline-flex items-center gap-2 px-4 py-1.5 text-sm rounded-md bg-slate-100 text-slate-700 hover:bg-blue-600 hover:text-white transition no-underline">
                       <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" 
                            viewBox="0 0 24 24" stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                 d="M15.232 5.232l3.536 3.536M9 11l3.536 3.536L20.768 7.536a2.5 2.5 0 00-3.536-3.536L9 11z"/>
                       </svg>
                       Editar
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
