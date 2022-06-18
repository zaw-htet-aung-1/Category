@extends('layouts.master')

@section('title', $post->title)

@section('content')
<div class="card">
    <div class="card-body">
        <h3>{{ $post->title }}</h3>
        <p>Post by Mg Mg on June 18, 2022</p>
        <p>{{ $post->body }}</p>
        
        <a href="/posts" class="btn btn-outline-secondary">Go Home</a>
    </div>
</div>
@endsection