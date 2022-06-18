@extends('layouts.master')

@section('title', 'Edit Post')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Edit Post</h3>
    </div>
    <div class="card-body">
        {{-- @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li style="color: red;">{{ $error }}</li>
            @endforeach
        </ul>
        @endif --}}

        <form action="/posts/{{ $post->id }}" method="POST">
            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Post Title</label>
                <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" value="{{ $post->title }}">
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Post Body</label>
                <textarea class="form-control  @error('body') is-invalid @enderror" name="body" rows="5">{{ $post->body }}</textarea>
                @error('body')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-outline-primary">Update</button>
                <a href="/posts" class="btn btn-outline-secondary">Back</a>
            </div>
        </form>
    </div>
</div>
 @endsection