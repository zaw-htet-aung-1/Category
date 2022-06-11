<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        // request()->all();
        // request('title')

        $post = new Post();
        $post->title = request('title');
        $post->body = request('body');
        $post->created_at = now();
        $post->updated_at = now();
        $post->save();

        return redirect('/posts');
    }

    public function edit($id)
    {
        $post = Post::find($id);

        return view('posts.edit', compact('post'));
    }

    public function update($id)
    {
        $post = Post::find($id);
        $post->title = "Changed Title";
        $post->updated_at = now();
        $post->save();

        return "Updated post";
    }

    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show', compact('post'));
    }

    public function destroy($id)
    {
        Post::destroy($id);

        // $post = Post::find($id);
        // $post->delete();

        return "Deleted Post";
    }
}
