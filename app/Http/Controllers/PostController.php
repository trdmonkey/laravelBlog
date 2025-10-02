<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // Validamos los campos
        $validated = $request->validate([
            'title'   => 'required|min:3|max:255',
            'content' => 'required|min:10',
        ]);

        $post = Post::create($validated);

        if ($request->hasFile('media')) {
            $file = $request->file('media');
            $path = $file->store('uploads', 'public'); // guarda en storage/app/public/uploads

            // Detectar tipo por extensión
            $extension = strtolower($file->getClientOriginalExtension());
            $type = in_array($extension, ['jpg','jpeg','png','webp']) ? 'image'
                : ($extension === 'gif' ? 'gif' : 'video');

            $post->media_type = $type;
            $post->media_url = $path;
            $post->save();
        }

        // return redirect()->route('posts.index')->with('success', 'Post creado correctamente.');
        return redirect()->route('posts.index')->with([
            'type' => 'success',
            'message' => 'Post creado correctamente.'
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title'   => 'required|min:3|max:255',
            'content' => 'required|min:10',
        ]);

        $post->update($validated);

        if ($request->hasFile('media')) {
            $file = $request->file('media');
            $path = $file->store('uploads', 'public'); // guarda en storage/app/public/uploads

            // Detectar tipo por extensión
            $extension = strtolower($file->getClientOriginalExtension());
            $type = in_array($extension, ['jpg','jpeg','png','webp']) ? 'image'
                : ($extension === 'gif' ? 'gif' : 'video');

            $post->media_type = $type;
            $post->media_url = $path;
            $post->save();
        }


        // return redirect()->route('posts.show', $post)->with('success', 'Post actualizado');
        return redirect()->route('posts.show', $post)->with([
            'type' => 'info',
            'message' => 'Post actualizado.'
        ]);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        // return redirect()->route('posts.index')->with('danger', 'Post eliminado');
        return redirect()->route('posts.index')->with([
            'type' => 'danger',
            'message' => 'Post eliminado.'
        ]);
    }
}
