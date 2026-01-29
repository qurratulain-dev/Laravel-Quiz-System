@extends('layouts.app')

@section('title', 'User Login - Online Quiz System')
@section('md','Login to your Online Quiz System account to securely access quizzes, manage your profile, and continue learning with interactive question sets.')

@push('head')
    <meta name="robots" content="noindex, nofollow">
     <link rel="canonical" href="{{ url()->current() }}">
@endpush
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center mt-5">
        <div class="col-md-4">

            <x-card title="Login">
                <form action="{{ route('loginMatch') }}" method="POST">
                    <x-error-list />
                    @csrf

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="Enter email" name="email">
                        <x-input-error name="email" />
                    </div>

                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Enter password" name="password">
                        <x-input-error name="password" />
                    </div>

                    <x-submit-button text="Login" type="primary" />

                    <div class="text-center mt-3">
                        <p class="mb-0">
                            Don’t have an account?
                            <a href="{{ route('register') }}">Register here</a>
                        </p>
                    </div>
                </form>
            </x-card>

        </div>
    </div>
</div>
@endsection
