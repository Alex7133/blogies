<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index()
    {
        // Filtrar solo los posts que tienen published_at no nulo y que ya se han publicado
        $posts = Post::whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->get();

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create', ['post' => new Post()]);
    }

    public function store(StorePostRequest $request)
    {
        // Crear un nuevo post con los datos validados, incluyendo el campo published_at si está presente
        $validatedData = $request->validated();
        $validatedData['published_at'] = now(); // Asigna la fecha y hora actuales

        Post::create($validatedData);

        return to_route('posts.index')
            ->with('status', 'Post created successfully');
    }


    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        // Actualizar el post con los datos validados, incluyendo el campo published_at
        $post->update($request->validated());

        return to_route('posts.show', $post)
            ->with('status', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return to_route('posts.index')
            ->with('status', 'Post deleted successfully');
    }


}
