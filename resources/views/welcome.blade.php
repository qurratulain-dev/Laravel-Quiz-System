@extends('layouts.app')

@section('title', 'Admin Login')

@section('content')

<h1>Welcome to the Quiz System</h1>
<p>This is a simple quiz system built with Laravel.</p>

<a href="{{ route('register') }}" class="btn btn-primary">
    Register
</a>

<a href="{{ route('login') }}" class="btn btn-secondary">
    Login
</a>

@endsection
