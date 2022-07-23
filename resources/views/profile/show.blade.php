@extends('layouts.master')

@section('title', 'Pofile | ' . auth()->user()->name)

@section('styles')
<style>
    .profile {
        width: 100px;
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

        <img class="profile" src="{{ auth()->user()->photo() }}" alt="Profile Image">

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input class="form-control @error('name') is-invalid @enderror"
                type="text"
                name="name"
                value="{{ old('name', auth()->user()->name) }}" disabled>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input class="form-control @error('email') is-invalid @enderror"
                type="email"
                name="email"
                value="{{ old('email', auth()->user()->email) }}" disabled>
        </div>

        <div class="">
            <a href="{{ route('profile.edit') }}" class="btn btn-outline-secondary">Edit</a>
            <a href="{{ route('change_password.edit') }}" class="btn btn-outline-secondary">Change Password</a>
        </div>
    </div>
</div>

@endsection