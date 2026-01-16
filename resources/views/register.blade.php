@extends('layouts.app')
@section('title', 'User Registration')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- crad -->
                <x-card title="Register">
                    <form action="{{ route('registerSave') }}" method="POST">
                        @csrf

                        {{-- Name --}}
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <x-input name="name" placeholder="Enter your name" />
                            <x-input-error name="name" />
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <x-input type="email" name="email" placeholder="Enter your email" />
                            <x-input-error name="email" />
                        </div>

                        {{-- Password --}}
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <x-input type="password" name="password" placeholder="Enter password" />
                            <x-input-error name="password" />
                        </div>

                        {{-- Confirm Password --}}
                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <x-input type="password" name="password_confirmation" placeholder="Confirm password" />
                        </div>

                        <div class="d-grid">
                            <x-submit-button text="Register" type="primary" />
                        </div>

                        <div class="text-center mt-3">
                            <p class="mb-0">
                                Already registered?
                                <a href="{{ route('login') }}">Login here</a>
                            </p>
                        </div>
                    </form>
                </x-card>
            </div>
        </div>
    </div>
@endsection
