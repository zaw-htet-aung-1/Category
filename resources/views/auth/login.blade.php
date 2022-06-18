@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<div class="container ">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-6">
            <div class="card">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <form action="/login" method="POST">
                        @csrf
    
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email"
                                name="email"
                                class="form-control">
                        </div>
    
                        <div class="mb-3">
                            <label
                                class="form-label">Password</label>
                            <input type="password"
                                name="password"
                                class="form-control">
                        </div>
    
                        <button type="submit"
                            class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection