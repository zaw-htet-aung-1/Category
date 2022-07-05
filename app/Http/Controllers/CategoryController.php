<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if($search = request('search')) {
        //     $categories = Category::where('name', 'like', "%$search%")->latest('id')->paginate(5)->withQueryString();
        // } else {
        //     $categories = Category::latest('id')->paginate(5);
        // }

        // $categories = Category::query();
        // if($search = request('search')) {
        //     $categories->where('name', 'like', "%$search%");
        // }
        // $categories = $categories->latest('id')->paginate(5)->withQueryString();

        $categories = Category::when(request('search'), function($query) {
            $query->where('name', 'like', "%" . request('search') . "%");
        })
        ->latest('id')
        ->paginate(5)
        ->withQueryString();

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        Category::create([
            'name' => $request->name
        ]);

        return redirect('categories')->with('success', 'A category was created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name
        ]);

        return redirect('categories')->with('success', 'A category was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return back()->with('success', 'A category was deleted successfully.');
    }
}
