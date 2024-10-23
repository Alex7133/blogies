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
        $posts = Post::all();

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

<<<<<<< HEAD
    public function store(StorePostRequest $request)
    {
        Post::create($request->validated());

        return to_route('posts.index')
            ->with('status', 'Post created successfully');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->validated());

        return to_route('posts.show', $post)
            ->with('status', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return to_route('posts.index')
            ->with('status', 'Post deleted successfully');
=======
        public function store(StorePostRequest $request)
    {
        Post::create($request->validated());


        return to_route('posts.index')
            ->with('status', 'Post created successfully');
>>>>>>> 4e4b122b329b6bd1c8e09b5759611822b9944003
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

        public function update(UpdatePostRequest $request, Post $post)
    {

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
