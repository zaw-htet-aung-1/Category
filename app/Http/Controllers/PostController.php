<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use  App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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

    // use  App\Http\Requests\PostRequest;
    // use Illuminate\Support\Facades\Validator;
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'body' => 'required',
        ]);

        if($validator->fails()) {
            return redirect('/posts/create')
            ->withErrors($validator)
            ->withInput();
        }
        // $this->myValidate($request);
        // Validate
        // $request->validate([
        //     'title' => 'required',
        //     'body' => 'required|min:5'
        // ],[
        //     'title.required' => 'ခေါင်းစဉ်ထည့်ပါ။',
        //     'body.required' => 'အကြောင်းအရာထည့်ပါ။',
        //     'body.min' => 'အနည်းဆုံး ၅လုံးထည့်ပါ။'
        // ]);

        // request()->all();
        // $request->all();
        // request('title')

        $post = new Post();
        // $post->title = request('title');
        // $post->body = request('body');
        $post->title = $request->title;
        $post->body = $request->body;
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

    public function update(PostRequest $request, $id)
    {
        // $this->myValidate($request);
        // $request->validate([
        //     'title' => 'required',
        //     'body' => 'required|min:5'
        // ],[
        //     'title.required' => 'ခေါင်းစဉ်ထည့်ပါ။',
        //     'body.required' => 'အကြောင်းအရာထည့်ပါ။',
        //     'body.min' => 'အနည်းဆုံး ၅လုံးထည့်ပါ။'
        // ]);

        $post = Post::find($id);
        // $post->title = request('title');
        // $post->body = request('body');
        $post->title = $request->title;
        $post->body = $request->body;
        $post->updated_at = now();
        $post->save();

        return redirect('/posts');
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

        return redirect('/posts');
    }

    // public function myValidate($request)
    // {
    //     $request->validate([
    //         'title' => 'required',
    //         'body' => 'required|min:5'
    //     ],[
    //         'title.required' => 'ခေါင်းစဉ်ထည့်ပါ။',
    //         'body.required' => 'အကြောင်းအရာထည့်ပါ။',
    //         'body.min' => 'အနည်းဆုံး ၅လုံးထည့်ပါ။'
    //     ]);
    // }
}
