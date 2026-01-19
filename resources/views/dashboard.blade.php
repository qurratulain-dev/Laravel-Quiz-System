@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <meta name="robots" content="noindex, nofollow">
    <h1>Welcome, {{ Auth::user()->name }}</h1>
    <p>
        Manage categories and quizzes from your dashboard.
    </p>
@endsection