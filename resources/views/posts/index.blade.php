@extends('layouts.master')

@section('title', 'Home Page')


@section('content')
<div class="container mt-5">

    <section class="row justify-content-end">
        <div class="col-5">
            <form>
                <div class="input-group mb-3">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search...">
                    <button class="btn btn-outline-secondary" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                          </svg>
                    </button>
                  </div>
            </form>
        </div>
    </section>

    <section class="row">
        <div class="col-12">
            {{-- @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif --}}
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if (count($posts) > 0)
                @foreach ($posts as $post)
                <div>
                    <h3>
                        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h3>
                    {{-- {{ $post->created_at->format('M d, Y') }} by Mark --}}
                    {{-- {{ $post->created_at->toDateString() }} by Mark --}}
                    {{-- {{ $post->created_at->toDateTimeString() }} by Mark --}}
                    {{-- {{ $post->created_at->toFormattedDateString() }} by Mark --}}
                    <i>{{ $post->created_at->diffForHumans() }}</i> by
                    {{-- <b> {{ $post->author }} </b> --}}
                    {{-- <b>{{ $post->user()->first()->name }}</b> --}}
                    <b>{{ $post->author->name }}</b>
                    <p>{{ $post->body }}</p> (category 1, category 2)
                    {{-- @if(Auth::check() && $post->user_id == Auth::id()) --}}
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
                <hr>
                @endforeach
            @else
                No post.
            @endif
            

            {{ $posts->links() }}
        </div>
    </section>
</div>
@endsection