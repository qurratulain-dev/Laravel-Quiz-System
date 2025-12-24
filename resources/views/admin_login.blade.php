@extends('layouts.app')

@section('title', 'Admin Login')

@section('content')
    <div class="container mt-5">
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-4">

                    <div class="card shadow">
                        <div class="card-header text-center">
                            <h3>Admin Login</h3>
                        </div>
                        @error('credentials')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div class="card-body">
                            <form method="POST" action="/admin_login">
                                @csrf

                                <div class="mb-3">
                                    <label>Email</label>
                                    <input type="email" class="form-control" placeholder="Enter email" name="email"
                                        >
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Enter password" name="password"
                                    >
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary w-100">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
