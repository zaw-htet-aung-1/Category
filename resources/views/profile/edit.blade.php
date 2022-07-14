@extends('layouts.master')

@section('title')
Edit Profile
@endsection

@section('content')
<div class="container w-50 bg-light rounded mt-3 justigy-content-center">
    <h4 class="text-center p-3">Edit Profile</h4>

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mt-3 mb-3">
            <label for="image" class="form-label">Image Upload</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
            @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', auth()->user()->name )}}" placeholder="Enter Your Name">
            @error('name')
            <p style="color:red">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" name="email" value="{{ old('email', auth()->user()->email )}}" placeholder="Enter Your Email">
            @error('email')
            <p style="color:red">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password ( *Optional )</label>
            <input type="text" class="form-control" name="password" placeholder="Change Your Password">
            @error('password')
            <p style="color:red">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-danger">Update</button>
        <a href="{{route('home')}}" class="btn btn-secondary">Cancle</a>
    </form>
</div>