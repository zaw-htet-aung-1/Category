@extends('layouts.master')

@section('title', 'Pofile | ' . auth()->user()->name)

@section('styles')
<style>
    .profile {
        object-fit: contain;
        width: 100px;
        height: 100px;
        border: 3px solid #1a7def;
        border-radius: 100%;
    }
</style>
@endsection

@section('content')

<div class="card">
    <div class="card-header">
        <h3>Profile</h3>
    </div>
    <div class="card-body">

        @include('common.alert')

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- @if(auth()->user()->image)
                <img class="profile" src="{{ Storage::url(auth()->user()->image->path) }}" alt="Profile Image">
            @else
                <img class="profile" src="{{ url('/images/avatar.png') }}" alt="Profile Image">
            @endif --}}

            <img class="profile" src="{{ auth()->user()->photo() }}" alt="Profile Image">

            <div class="mb-3">
                <label class="form-label">Post Image</label>
                <input class="form-control @error('image') is-invalid @enderror" type="file" name="image">
                @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input class="form-control @error('name') is-invalid @enderror" 
                    type="text" 
                    name="name" 
                    value="{{ old('name', auth()->user()->name) }}">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input class="form-control @error('email') is-invalid @enderror" 
                type="email" 
                name="email" 
                value="{{ old('email', auth()->user()->email) }}">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-outline-primary">Update</button>
                <a href="{{ route('profile.show') }}" class="btn btn-outline-secondary">Back</a>
            </div>
        </form>
    </div>
</div>

@endsection