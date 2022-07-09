@extends('layouts.master')

@section('title', 'Home Page')

@section('content')
<div class="container mt-5">
    @include('common.alert')
    <div class="row">
        <!-- Post List -->

        <div class="col-md-8">
            @if (count($posts) > 0)
            @foreach ($posts as $post)
            <div class="card mb-3">
                <img src="https://colorlibhub.com/sparkling/wp-content/uploads/sites/52/2014/01/city-landscape-slider-750x410.jpg"
                    class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title h2">{{ $post->title }}</h5>
                    <p class="text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-calendar-week-fill" viewBox="0 0 16 16">
                            <path
                                d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zM9.5 7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm3 0h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zM2 10.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3.5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z" />
                        </svg>
                        {{ $post->created_at->toFormattedDateString() }}
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        </svg> {{ $post->author->name }}
                        @php
                        $category_ids = DB::table('category_post')
                        ->where('post_id', $post->id)
                        ->get()
                        ->pluck('category_id')
                        ->toArray();

                        $categories = \App\Models\Category::whereIn('id', $category_ids)->get();
                        @endphp
                        @foreach ($categories as $category)
                        {{-- @foreach ($post->categories()->get() as $category) --}}
                        {{-- @foreach ($post->categories as $category) --}}
                        <span class="badge text-bg-info">{{ $category->name }}</span>
                        @endforeach
                    </p>
                    <p class="card-text text-muted">
                        {{ $post->body }}
                    </p>
                    <div class="d-flex justify-content-between">
                        <div>
                            @if($post->isOwnPost())
                            <div class="d-flex justify-content-end">
                                <a href="/posts/{{ $post->id }}/edit/" class="btn btn-outline-success">Edit</a>
                                <form action="/posts/{{ $post->id }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure to delete?')">
                                    @method('DELETE')
                                    {{-- <input type="hidden" name="_method" value="DELETE"> --}}
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger ms-2">Delete</button>
                                </form>
                            </div>
                            @endif
                        </div>
                        <a href="#" class="btn btn-primary text-uppercase">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <p>No Post.</p>
            @endif
        </div>

        <!-- Sidebar -->
        <div class="col-md-4">
            <!-- Search -->
            <div class="card card-body">
                <form>
                    <div class="input-group">
                        <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                            placeholder="Search...">
                        <button class="btn btn-primary" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
            <!-- Recent Posts -->
            <div class="card card-body mt-3">
                <h5 class="mb-4 mt-2">Recent Posts</h5>
                @foreach(range(1, 5) as $category)
                <div class="row">
                    <div class="col-4 text-center">
                        <img src="https://colorlibhub.com/sparkling/wp-content/uploads/sites/52/2014/01/city-landscape-slider-60x60.jpg"
                            alt="" class="img-fluid">
                    </div>
                    <div class="col-8">
                        <a href="#"> How to Use WordPress Pingbacks And Trackbacks</a>
                        <p class="text-muted">April 7, 2015</p>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Categroies -->
            <div class="card card-body mt-3">
                <h5 class="mb-4 mt-2">Categories</h5>
                <ul class="list-group list-group-flush">
                    @foreach(range(1, 5) as $category)
                    <li class="list-group-item d-flex">
                        <div class="flex-grow-1">
                            <a href="#">Cat bname</a>
                        </div>
                        <div>(10)</div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection