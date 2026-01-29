@extends('layouts.app')

@section('title', 'Admin Dashboard - Manage Quizzes and Categories')
@section('md', 'Admin dashboard to manage categories, quizzes, and system content.')

@push('head')
    <meta name="robots" content="noindex, nofollow">
     <link rel="canonical" href="{{ url()->current() }}">
@endpush

@section('content')
<div class="container mt-5">

    <h1 class="mb-3">
        Welcome, {{ Auth::user()->name }}
    </h1>
    <h2 class="h5 text-muted mb-4">
        Admin Dashboard
    </h2>

    <p>
        From this dashboard, you can manage categories, quizzes, and related administrative tasks.
    </p>

</div>
@endsection
