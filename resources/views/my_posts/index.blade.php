@extends('layouts.master')

@section('title', 'My Posts')

@section('content')

@foreach ($posts as $post)
    <li>{{ $post->title }}</li>
@endforeach

@stop