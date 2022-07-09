<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use  App\Http\Requests\PostRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index(Request $request)
    {
        // $request->search;
        // $request->input('search');
        // $request->get('search');
        // $request->query('search'); // Get method only
        // request('search');

        // $posts = Post::all();
        $posts = Post::where('title', 'like', '%' . $request->search . '%')->orderBy('id', 'desc')->paginate(3);

        // $posts = Post::select(['posts.*', 'users.name'])
        // ->join('users', 'users.id', '=', 'posts.user_id')
        // ->get()
        // ->toArray();
        // $posts = Post::select('posts.*', 'users.name as author')
        // ->join('users', 'users.id', '=', 'posts.user_id')
        // // ->simplePaginate(3);
        // ->orderBy('id', 'desc')
        // ->paginate(3);

        // $posts = DB::table('posts')->join('users', 'users.id', '=', 'posts.user_id')->first();


        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('posts.create', compact('categories'));
    }

    // use  App\Http\Requests\PostRequest;
    // use Illuminate\Support\Facades\Validator;
    public function store(PostRequest $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'title' => 'required',
        //     'body' => 'required',
        // ]);

        // if($validator->fails()) {
        //     return redirect('/posts/create')
        //     ->withErrors($validator)
        //     ->withInput();
        // }
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

        // $post = new Post();
        // // $post->title = request('title');
        // // $post->body = request('body');
        // $post->title = $request->title;
        // $post->body = $request->body;
        // $post->created_at = now();
        // $post->updated_at = now();
        // $post->save();

       

        // $post = Post::create([
        //     'title' =>  $request->title,
        //     'body' =>  $request->body,
        //     'user_id' => auth()->id(),
        // ]);

        // $post = auth()->user()->posts()->create([
        //     'title' =>  $request->title,
        //     'body' =>  $request->body,
        // ]);

        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $dir = public_path('upload/images');
        $file->move($dir, $filename);

        $post = auth()->user()->posts()->create($request->only('title', 'body'));

        $post->categories()->attach($request->category_ids);

        // foreach($request->category_ids as $categoryId) {
        //     DB::table('category_post')->insert([
        //         'post_id' => $post->id,
        //         'category_id' => $categoryId,
        //     ]);
        // }


        // Post::create($request->only(['title', 'body']));

        // $request->session()->flash('success', 'A post was created successfully.');
        // session()->flash('success', 'A post was created successfully.');

        return redirect('/posts')->with('success', 'A post was created successfully.');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $oldCategoryIds = $post->categories->pluck('id')->toArray();
        $categories = Category::all();

        return view('posts.edit', compact('post', 'categories', 'oldCategoryIds'));
    }

    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);
        $post->update($request->only(['title', 'body']));

        $post->categories()->sync($request->category_ids);
        return redirect('/posts')->with('success', 'A post was updated successfully.');

        // $this->myValidate($request);
        // $request->validate([
        //     'title' => 'required',
        //     'body' => 'required|min:5'
        // ],[
        //     'title.required' => 'ခေါင်းစဉ်ထည့်ပါ။',
        //     'body.required' => 'အကြောင်းအရာထည့်ပါ။',
        //     'body.min' => 'အနည်းဆုံး ၅လုံးထည့်ပါ။'
        // ]);

        // $post = Post::find($id);
        // $post->title = request('title');
        // $post->body = request('body');
        // $post->title = $request->title;
        // $post->body = $request->body;
        // $post->updated_at = now();
        // $post->save();

        // $post->update([
        //     'title' => $request->title,
        //     'body' => $request->body,
        // ]);
        // $post->update($request->only(['title', 'body']));

        // $post->categories()->detach($post->categories->pluck('id')->toArray());
        // $post->categories()->attach($request->category_ids);

        // $post->categories()->sync($request->category_ids);

        // DB::table('category_post')->where('post_id', $post->id)->delete();

        // foreach($request->category_ids as $categoryId) {
        //     DB::table('category_post')->insert([
        //         'post_id' => $post->id,
        //         'category_id' => $categoryId,
        //     ]);
        // }

        // session()->flash('success', 'A post was updated successfully.');

        // return redirect('/posts')->with('success', 'A post was updated successfully.');
    }

    public function show($id)
    {
        // $post = Post::find($id);
        $post = Post::select(['posts.*', 'users.name as author'])
        ->join('users', 'users.id', 'posts.user_id')
        ->where('posts.id', $id)
        ->first();
        // ->find($id);


        // ->where('posts.id', $id)
        // ->first();


        return view('posts.show', compact('post'));
    }

    public function destroy($id)
    {
        Post::destroy($id);

        // $post = Post::find($id);
        // $post->delete();

        return redirect('/posts')->with('success', 'A post was deleted successfully.');
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
