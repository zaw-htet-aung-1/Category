@extends('layouts.master')

@section('title', 'Pofile | ' . auth()->user()->name)

@section('content')

<div class="card">
    <div class="card-header">
        <h3>Change Password</h3>
    </div>
    <div class="card-body">

        @include('common.alert')

        <form action="{{ route('change_password.update') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Old Password</label>
                <input class="form-control @error('old_password') is-invalid @enderror" 
                    type="password" 
                    name="old_password" 
                    value="{{ old('old_password') }}">
                @error('old_password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">New Password</label>
                <input class="form-control @error('new_password') is-invalid @enderror" 
                    type="password" 
                    name="new_password" 
                    value="{{ old('new_password') }}">
                @error('new_password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input class="form-control @error('confirm_password') is-invalid @enderror" 
                    type="password" 
                    name="confirm_password" 
                    value="{{ old('confirm_password') }}">
                @error('confirm_password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-outline-primary">Change</button>
                <a href="/" class="btn btn-outline-secondary">Back</a>
            </div>
        </form>
    </div>
</div>

@endsection